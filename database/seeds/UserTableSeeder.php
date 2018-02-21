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
       $role_customer   = Role::where(‘name’, ‘customer’)->first();
       $role_merchant   = Role::where(‘name’, 'merchant')->first();
       $role_admin      = Role::where(‘name’, 'admin')->first();

       $employee = new User();
       $employee->name = ‘Customer’;
       $employee->email = ‘customer@gmail.com’;
       $employee->password = bcrypt(‘1234567890’);
       $employee->save();

       $employee->roles()->attach($role_customer);

       $manager = new User();
       $manager->name = ‘Merchant’;
       $manager->email = ‘merchant@gmail.com’;
       $manager->password = bcrypt(‘1234567890’);
       $manager->save();

       $manager->roles()->attach($role_merchant);


       $manager = new User();
       $manager->name = ‘Admin’;
       $manager->email = ‘admin@gmail.com’;
       $manager->password = bcrypt(‘1234567890’);
       $manager->save();

       $manager->roles()->attach($role_admin);

     }
}
