<?php

use Illuminate\Database\Seeder;

class FirstCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('first_categories')->insert([
          'name' => 'Diagnostic',
          'slug' => 'diagnostic',
          'description' => 'Lorem',
          'status' => 1,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')

      ]);
      DB::table('first_categories')->insert([
          'name' => 'Rehabilitation',
          'slug' => 'rehabilitation',
          'description' => 'Lorem',
          'status' => 1,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')

      ]);
      DB::table('first_categories')->insert([
          'name' => 'Spa & Beauty',
          'slug' => 'spa',
          'description' => 'Lorem',
          'status' => 1,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')

      ]);
      DB::table('first_categories')->insert([
          'name' => 'Treatment',
          'slug' => 'treatment',
          'description' => 'Lorem',
          'status' => 1,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')

      ]);
    }
}
