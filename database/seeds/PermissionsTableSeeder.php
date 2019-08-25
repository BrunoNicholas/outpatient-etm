<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;
use App\User;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
        	[
        		'name' 			=>	'role_create',
        		'display_name'	=>	'Create Role',
        		'description'	=>	'Can create a role',
        	],
        	[
        		'name' 			=>	'role_edit',
        		'display_name'	=>	'Edit Role',
        		'description'	=>	'Can edit a role',
        	],
        	[
        		'name' 			=>	'role_view',
        		'display_name'	=>	'View Role',
        		'description'	=>	'Can view a role',
        	],
        	[
        		'name' 			=>	'role_delete',
        		'display_name'	=>	'Delete Role',
        		'description'	=>	'Can delete a user',
        	],
        	[
        		'name' 			=>	'user_create',
        		'display_name'	=>	'Create User',
        		'description'	=>	'Can create a user',
        	],
        	[
        		'name' 			=>	'user_edit',
        		'display_name'	=>	'Edit User',
        		'description'	=>	'Can edit a user',
        	],
        	[
        		'name' 			=>	'user_view',
        		'display_name'	=>	'View User',
        		'description'	=>	'Can view a user',
        	],
        	[
        		'name' 			=>	'user_delete',
        		'display_name'	=>	'Delete User',
        		'description'	=>	'Can delete a user',
        	],
        	[
        		'name' 			=>	'team_create',
        		'display_name'	=>	'Create a Team',
        		'description'	=>	'Can create a Team',
        	],
            [
                'name'          =>  'team_edit',
                'display_name'  =>  'Edit User',
                'description'   =>  'Can edit a user',
            ],
            [
                'name'          =>  'team_view',
                'display_name'  =>  'View User',
                'description'   =>  'Can view a user',
            ],
            [
                'name'          =>  'team_delete',
                'display_name'  =>  'Delete User',
                'description'   =>  'Can delete a user',
            ],
        ];

        foreach ($permissions as $key => $value) {
        	Permission::create($value);
        }
    }
}
