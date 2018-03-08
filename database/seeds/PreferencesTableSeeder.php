<?php

use Illuminate\Database\Seeder;



class PreferencesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
     public function run()
     {

       DB::table('preferences')->insert([
            'company_name'  => 'My World Health',
            'email'         => 'admin@gmail.com',
            'address'       => 'address',
            'phone'         => 'phone',
            'fax'           => 'fax',
            'postcode'      => '100000',
            'country_id'    => '1',
            'city_id'       => '1',
            'state'         => 'state',
            'map'           => '#',
            'facebook'      => '#',
            'twitter'       => '#',
            'youtube'       => '#',
            'path'          => 'images/',
            'fimename'      => 'noimages.png',
            'created_at'    => date('Y-m-d H:i:s'),
            'updated_at'    => date('Y-m-d H:i:s')

        ]);

     }
}
