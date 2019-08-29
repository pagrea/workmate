<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    // $this->call(RolesTableSeeder::class);

    /***************************Creating Roles************************************************** */
    \DB::table('roles')->delete();
        
    \DB::table('roles')->insert(array (
        0 => 
        array (
            'id' => 1,
            'name' => 'User',
            'guard_name' => 'web',
            'created_at' => '2019-08-26 08:53:34',
            'created_at' => '2019-08-26 08:53:34',
        ),
        1 => 
        array (
            'id' => 2,
            'name' => 'Hod',
            'guard_name' => 'web',
            'created_at' => '2019-08-26 08:53:34',
            'created_at' => '2019-08-26 08:53:34',
        ),
        2 => 
        array (
            'id' => 3,
            'name' => 'CD',
            'guard_name' => 'web',
            'created_at' => '2019-08-26 08:53:34',
            'created_at' => '2019-08-26 08:53:34',
        ),
        3 => 
        array (
            'id' => 4,
            'name' => 'Admin',
            'guard_name' => 'web',
            'created_at' => '2019-08-26 08:53:34',
            'created_at' => '2019-08-26 08:53:34',
        ),
        4 => 
        array (
            'id' => 5,
            'name' => 'HR',
            'guard_name' => 'web',
            'created_at' => '2019-08-26 08:53:34',
            'created_at' => '2019-08-26 08:53:34',
        ),
    ));


/***************************Creating permissions************************************************** */
    
    \DB::table('permissions')->delete();
        
    \DB::table('permissions')->insert(array (
        0 => 
        array (
            'id' => 1,
            'name' => 'View HR Corner',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:04:13',
            'updated_at' => '2018-10-30 09:04:13',
        ),
        1 => 
        array (
            'id' => 2,
            'name' => 'View HOD corner',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:52',
            'updated_at' => '2018-10-30 09:50:52',
        ),
        2 => 
        array (
            'id' => 3,
            'name' => 'View My Corner',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:52',
            'updated_at' => '2018-10-30 09:50:52',
        ),
        3 => 
        array (
            'id' => 4,
            'name' => 'View director Corner',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:52',
            'updated_at' => '2018-10-30 09:50:52',
        ),
        4 => 
        array (
            'id' => 5,
            'name' => 'create user',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:52',
            'updated_at' => '2018-10-30 09:50:52',
        ),
        5 => 
        array (
            'id' => 6,
            'name' => 'edit user',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:53',
            'updated_at' => '2018-10-30 09:50:53',
        ),
        6 => 
        array (
            'id' => 7,
            'name' => 'edit permision',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:53',
            'updated_at' => '2018-10-30 09:50:53',
        ),
        7 => 
        array (
            'id' => 8,
            'name' => 'HOD leave approval',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:53',
            'updated_at' => '2018-10-30 09:50:53',
        ),
        8 => 
        array (
            'id' => 9,
            'name' => 'approve hods leave',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:53',
            'updated_at' => '2018-10-30 09:50:53',
        ),

        9 => 
        array (
            'id' => 10,
            'name' => 'view users',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:53',
            'updated_at' => '2018-10-30 09:50:53',
        ),
        10 => 
        array (
            'id' => 11,
            'name' => 'HR leave Approval',
            'guard_name' => 'web',
            'created_at' => '2018-10-30 09:50:53',
            'updated_at' => '2018-10-30 09:50:53',
        ),
    ));
    
    
    /***************************Linking Permision to roles************************************************** */

    \DB::table('role_has_permissions')->delete();
        
    \DB::table('role_has_permissions')->insert(array (
        0 => 
        array (
            'permission_id' => 3,
            'role_id' => 1,
        ),
        1 => 
        array (
            'permission_id' => 3,
            'role_id' => 2,
        ),
        2 => 
        array (
            'permission_id' => 8,
            'role_id' => 2,
        ),
        3 => 
        array (
            'permission_id' => 2,
            'role_id' => 2,
        ),
        4 => 
        array (
            'permission_id' => 3,
            'role_id' => 3,
        ),
        5 => 
        array (
            'permission_id' => 4,
            'role_id' =>3,
        ),

        6 => 
        array (
            'permission_id' => 9,
            'role_id' => 3,
        ),

        7 => 
        array (
            'permission_id' => 1,
            'role_id' => 4,
        ),

        8 => 
        array (
            'permission_id' => 2,
            'role_id' => 4,
        ),
        9 => 
        array (
            'permission_id' => 3,
            'role_id' => 4,
        ),
        10 => 
        array (
            'permission_id' => 4,
            'role_id' => 4,
        ),
        11 => 
        array (
            'permission_id' => 5,
            'role_id' => 4,
        ),
        12 => 
        array (
            'permission_id' => 6,
            'role_id' => 4,
        ),
        13 => 
        array (
            'permission_id' => 7,
            'role_id' => 4,
        ),
        14 => 
        array (
            'permission_id' => 8,
            'role_id' => 4,
        ),
        15 => 
        array (
            'permission_id' => 9,
            'role_id' => 4,
        ),
        16 => 
        array (
            'permission_id' => 10,
            'role_id' => 4,
        ),

        17 => 
        array (
            'permission_id' => 1,
            'role_id' => 5,
        ),
        18 => 
        array (
            'permission_id' => 2,
            'role_id' => 5,
        ),

        19 => 
        array (
            'permission_id' => 3,
            'role_id' => 5,
        ),
        20 => 
        array (
            'permission_id' => 5,
            'role_id' => 5,
        ),
        21 => 
        array (
            'permission_id' => 6,
            'role_id' => 5,
        ),

        22 => 
        array (
            'permission_id' => 8,
            'role_id' => 5,
        ),

        23 => 
        array (
            'permission_id' => 10,
            'role_id' => 5,
        ),
        24 => 
        array (
            'permission_id' => 11,
            'role_id' => 5,
        ),

        24 => 
        array (
            'permission_id' => 11,
            'role_id' => 4,
        ),
    ));
    
     /***************************Linking Permision to roles************************************************** */


    }
}
