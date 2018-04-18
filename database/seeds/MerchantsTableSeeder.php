<?php

use Illuminate\Database\Seeder;

class MerchantsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('merchants')->insert([
          'name' => 'Merchant',
          'email' => 'merchant@gmail.com',
          'password' => bcrypt('1234567890'),
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')

      ]);
    }
}
