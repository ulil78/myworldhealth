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
       $role_employee = new Role();
       $role_employee->name = 'customer';
       $role_employee->description = 'A Customer User';
       $role_employee->save();

       $role_manager = new Role();
       $role_manager->name = 'merchant';
       $role_manager->description = 'A Merchant User';
       $role_manager->save();

       $role_manager = new Role();
       $role_manager->name = 'Admin';
       $role_manager->description = 'A Admin User';
       $role_manager->save();

     }
}
