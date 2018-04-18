<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(FirstCategoriesSeeder::class);
        $this->call(FirstCategoriesSeeder::class);
        $this->call(FirstCategoriesSeeder::class);
        // 
        $this->call(GroupsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(AdminsTableSeeder::class);
        $this->call(MerchantsTableSeeder::class);
        
    }
}
