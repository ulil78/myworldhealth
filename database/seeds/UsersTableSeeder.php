<?php

use Illuminate\Database\Seeder;
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

       DB::table('users')->insert([
            'name' => 'customer',
            'email' => 'customer@gmail.com',
            'password' => bcrypt('1234567890'),
            'status'   => 'true',            
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')

        ]);

     }
}
