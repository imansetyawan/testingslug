<?php

use Illuminate\Database\Seeder;
use App\Role;


class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = new Role();
        $role_user->id = '1';
        $role_user->name = 'user';
        $role_user->save();

        $role_admin = new Role();
        $role_admin->id = '2';
        $role_admin->name = 'admin';
        $role_admin->save();

        $role_author = new Role();
        $role_author->id = '3';
        $role_author->name = 'author';
        $role_author->save();
    }
}
