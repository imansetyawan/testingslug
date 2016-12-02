<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds. 
     *
     * @return void
     */
    public function run()
    {
    	$role_user = Role::where('name', 'user')->first();
    	$role_admin = Role::where('name', 'admin')->first();
    	$role_author = Role::where('name', 'author')->first();

        $user = new User();
        $user->name = 'Victor';
        $user->email = 'visitor@mail.com';
        $user->password = bcrypt('123456');
        $user->save();
        $user->roles()->attach($role_user);

        $admin = new User();
        $admin->name = 'Alex';
        $admin->email = 'admin@mail.com';
        $admin->password = bcrypt('123456');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $author = new User();
        $author->name = 'Andrew';
        $author->email = 'author@mail.com';
        $author->password = bcrypt('123456');
        $author->save();
        $author->roles()->attach($role_author);
    }
}
