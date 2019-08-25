<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_super = new User();
        $user_super->name = 'Bruno Nicholas';
        $user_super->email = 'sbnibro256@gmail.com';
        $user_super->password = bcrypt('dollar');
        $user_super->age = 100;
        $user_super->gender = 'Male';
        $user_super->telephone = '0782407042';
        $user_super->location = 'Mutungo';
        $user_super->role = 'super-admin';
        $user_super->status = 'Active';
        $user_super->save();

        $user_admin = new User();
        $user_admin->name = 'Kaye Francis';
        $user_admin->email = 'kayefrancis05@gmail.com';
        $user_admin->password = bcrypt('dollar');
        $user_admin->age = 50;
        $user_admin->gender = 'Male';
        $user_admin->telephone = '';
        $user_admin->location = 'Mutungo';
        $user_admin->role = 'super-admin';
        $user_admin->status = 'Active';
        $user_admin->save();

        DB::table('role_user');

        $user_admin->attachRole(Role::where('name','admin')->first());
        $user_super->attachRole(Role::where('name','super-admin')->first());
    }
}
