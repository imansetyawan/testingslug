<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Auth;
use App\User;
use App\Role;
use Hash, Mail;
use Input;
use Socialite;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //$this->middleware('roles:admin');
    }
    
    public function index()
    {
        $users = User::all();
        return view('user.user', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user = User::all();
        return view('user.insert', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:users',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed'
            ]);

        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();        
        $user->roles()->attach(Role::where('name', 'author')->first());
        return redirect()->route('index_user')->with('messageinsert','User sudah berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:6|confirmed'
            ]);

        $user = User::find($id);
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->save();
        return redirect()->route('index_user')->with('messageupdate','User sudah berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->route('index_user')->with('messagedelete','User sudah berhasil dihapus');
    }

    public function getLogin(){
        return view('userauth.login');
    }

    public function postLogin(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
            ]);

        if (Auth::attempt([
            'email' => $request->input('email'), 
            'password' => $request->input('password'),
            'confirmed' => 1]))
        {
        return redirect()->route('admin_home');
        }
        
        else 
        {
            return redirect()->route('login')->with('messageerror','Login is Failed Check again Email or your Password');
        }
        

        // if (Auth::attempt(
        // $user->name = $request->name;
        // $user->password = $request->password)){
        //     return redirect()->route('user.profile');
        // }
        // return redirect()->back();
    }

    public function getRegister(){
        return view('userauth.register');
    }

    public function postRegister(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|min:6|confirmed'
            ]);

        $confirmation_code = str_random(30);

        $user = new User;
        $user->name = $request->name;
        $user->password = bcrypt($request->password);
        $user->email = $request->email;
        $user->confirmation_code = $confirmation_code;

        Mail::send('user.verify', ['confirmation_code' => $confirmation_code], function($m) {
            $m->from('blog@blog.com', 'AppBlog');
            $m->to(Input::get('email'), Input::get('name'))
                ->subject('Konfirmasi alamat email anda');
        });
        $user->save();
        $user->roles()->attach(Role::where('name', 'user')->first());
        return redirect()->route('login')->with('messagesuccessregist','Please verify your account in email');
    }

    public function confirm($confirmation_code)
    {
        if(!$confirmation_code)
        {
            return "link tidak terdaftar";
        }
        $user = User::where('confirmation_code', $confirmation_code)->first();

        if (!$user)
        {
            return "link tidak terdaftar";
        }

        $user->confirmed = 1;
        $user->confirmation_code = null;
        $user->save();
        return redirect()->route('login')->with('messageinsert','Register is Succesfull');
    }

    public function getProfile(){
        return view('profil.profil');
    }

    public function getForgot(){
        return view('userauth.ForgotPass');
    }

        public function redirectToProvider()

        {
            return Socialite::driver('facebook')->redirect();
        }

     public function handleProviderCallback()
    {
        // 1 check if the user exists in our database with facebook_id
        // 2 if not create a new user
        // 3 login this user into our application
        try
        {
            $socialUser = Socialite::driver('facebook')->user();
        }
        catch (\Exception $e)
        {
            return redirect('/');
        }
        $user = User::where('facebook_id',$socialUser->getId())->first();
        if(!$user)
            User::create([
               'facebook_id' => $socialUser->getId(),
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
            ]);
        auth()->login($user);
        return redirect()->route('admin_home');
        return $user->getEmail();
        
    }


    public function redirectToProviderGoogle()
        {
            return Socialite::driver('google')->redirect();
        }

  
    public function handleProviderCallbackGoogle()
        {
            $user = Socialite::driver('google')->user();
            dd($user);
            
        }

    public function postAssignRoles(Request $request)
    {
        $user = User::where('email', $request['email'])->first();
        $user->roles()->detach();
        if ($request['role_user']) {
            $user->roles()->attach(Role::where('name', 'user')->first());
        }
        if ($request['role_author']) {
            $user->roles()->attach(Role::where('name', 'author')->first());
        }
        if ($request['role_admin']) {
            $user->roles()->attach(Role::where('name', 'admin')->first());
        }
        return redirect()->back();
    }
}


