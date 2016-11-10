<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Kategori;
use App\User;
use App\Message;
use App\Info;
use App\Subscriber;
use App\Http\Requests;
use Hash, Mail;
use Input;
use Image;

class BlogController extends Controller
{
    public function __construct()
    {
        // parent::__construct(); // function ini juga menjalankan cunstructor dari parentnya.
        $this->data['infos'] = Info::all();
        $this->data['randoms'] = Artikel::orderByRaw('RAND()')->take(1)->get();
        $this->data['recents'] = Artikel::orderBy('created_at', 'DESC')->take(4)->get();
        $this->data['mostpop'] = Artikel::orderBy('pageview', 'DESC')->take(4)->get();
        $this->data['kategoris'] = Kategori::withCount('artikel')->get();
    }

    /**
     * Untuk menampilkan halaman list artikel.
     *
     * @return view
     */
    public function index()
    {
        $this->data['artikels'] = Artikel::orderBy('created_at', 'DESC')->paginate(8);
        $this->data['title'] = 'Portal Berita Kotha Pro Malang';
        return view('blog.indexblog', $this->data);
    }

    /**
     * Untuk menampilkan halaman single artikel.
     *
     * @param  string  $slug
     * @return view
     */
    public function show($slug)
    {
        $artikel = Artikel::where('slug', $slug)->first();
        $this->data['relatedartikel'] = Artikel::where('kategori_id', $artikel->kategori_id)->where('id', '!=', $artikel->id)->take(3)->get();
        if(!$artikel){
            abort(503);
        }
        $artikel->increment('pageview');
        $artikel->save();
        $this->data['title'] = $artikel->judulartikel;
        $this->data['artikel'] = $artikel;
        return view('blog.singleblog', $this->data); 
    }

    /**
     * Artikel baru - Untuk menyimpan ke database dan blast email.
     *
     * @param  string  $slug
     * @return void
     */
    /*public function artikel_baru(Request $request)
    {
        // input db
        $this->input_db_artikel_baru($request);
        // blast email ke orang yang daftar newsletter
        $this->blast_email_artikel_baru($request);
    }

    public function input_db_artikel_baru(Request $request)
    {
        $artikel = new Artikel;
        $artikel->.... = ...
        $artikel->save();
    }

    public function blast_email_artikel_baru(Request $request)
    {
        Mail::........
    }*/

    public function cari(request $request)
    {
        $field = $request->get('search');
        $hasil = Artikel::where('judulartikel', 'LIKE', '%' . $field . '%')->paginate(5);
        return view('blog.result', $this->data, ['hasil' => $hasil, 'field' => $field]);
    }

    public function getAuthor($name)
    {
        $this->data['user'] = User::where('name', $name)->first();
        return view ('blog.artikeluser', $this->data);
    }

    public function getKategori($slug)
    {   
        $this->data['slug'] = Kategori::where('slug', $slug)->first();
        $this->data['artikel'] = Artikel::where('kategori_id', $this->data['slug']->id)->paginate(8);
        return view ('blog.kontenkategori', $this->data);
    }

    public function getContact()
    {
        return view ('blog.contactus', $this->data);
    }

    public function postContact(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'pesan' => 'required',
            ]);

        $message = new message;
        $message->name = $request->name;
        $message->email = $request->email;
        $message->subject = $request->subject;
        $message->message = $request->pesan;

        $this->data['pesan'] = $message->message;
        $this->data['email'] = $message->email;

        Mail::send('blog.message',$this->data, function($m) {
            $m->from(Input::get('email'), 'Message Blog');
            $m->to('blogmagang@gmail.com')
                ->subject(Input::get('subject'));
        });

        $message->save();
        return redirect('/blog');
    }

    
}

