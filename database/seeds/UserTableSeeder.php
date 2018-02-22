<?php

use Illuminate\Database\Seeder;
use App\User;


class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {


         $employee = new User();
         $employee->name = 'Customer';
         $employee->email = 'customer@gmail.com';
         $employee->password = bcrypt('1234567890');
         $employee->save();





     }
}
