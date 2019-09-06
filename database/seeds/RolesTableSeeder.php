<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\User;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_super = new Role();
        $role_super->name = 'super-admin';
        $role_super->display_name = 'Super-Admin';
        $role_super->description = 'Full Access Permission';
        $role_super->save();

        $role_admin = new Role();
        $role_admin->name = 'admin';
        $role_admin->display_name = 'Administrator';
        $role_admin->description = 'An Administrator';
        $role_admin->save();

        $role_hr = new Role();
        $role_hr->name = 'pno';
        $role_hr->display_name = 'Principle Nursing Officer';
        $role_hr->description = 'The Principle Nursing Officer (PNO)';
        $role_hr->save();

        $role_hr = new Role();
        $role_hr->name = 'pno_admin';
        $role_hr->display_name = 'Principle Nursing Officer & Admin';
        $role_hr->description = 'Administrator and A Principle Nursing Officer';
        $role_hr->save();

        $role_ = new Role();
        $role_->name = 'specialist';
        $role_->display_name = 'Medical Specialist';
        $role_->description = 'The medical specialist';
        $role_->save();

        $role_ = new Role();
        $role_->name = 'supervisor';
        $role_->display_name = 'Supervisor';
        $role_->description = 'The Medical Supervisor';
        $role_->save();

        $role_ = new Role();
        $role_->name = 'nurse';
        $role_->display_name = 'Nurse';
        $role_->description = 'A nurse';
        $role_->save();


        $role_ = new Role();
        $role_->name = 'receptionist';
        $role_->display_name = 'Receptionist';
        $role_->description = 'The system receptionist';
        $role_->save();

        $role_subscriber = new Role();
        $role_subscriber->name = "subscriber";
        $role_subscriber->display_name = "Subscriber";
        $role_subscriber->description = "A user subscribed to ". config('app.name');
        $role_subscriber->save();

        $role_sub = new Role();
        $role_sub->name = 'client';
        $role_sub->display_name = 'Client';
        $role_sub->description = 'System Client';
        $role_sub->save();
    }
}
