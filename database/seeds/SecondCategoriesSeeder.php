<?php

use Illuminate\Database\Seeder;

class SecondCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('second_categories')->insert([
          'first_category_id' => 4,
          'name' => 'Atopic dermatitis (eczema)',
          'slug' => 'dermatitis',
          'description' => 'Lorem',
          'status' => 1,
          'created_at' => date('Y-m-d H:i:s'),
          'updated_at' => date('Y-m-d H:i:s')
      ]);
    }
}
