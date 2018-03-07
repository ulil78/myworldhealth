<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preferences', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name');
            $table->text('address');
            $table->string('phone');
<<<<<<< HEAD
            $table->string('city');
            $table->string('state');
            $table->string('country');
            $table->string('postcode');
            $table->string('map');
            $table->string('fax');
            $table->string('email');
            $table->string('facebook');
            $table->string('twitter');
            $table->string('youtube');
=======
            $table->integer('city_id')->unsigned();
            $table->string('state');
            $table->integer('country_id')->unsigned();
            $table->string('postcode');
            $table->string('map')->default('#');
            $table->string('fax');
            $table->string('email');
            $table->string('facebook')->default('#');
            $table->string('twitter')->default('#');
            $table->string('youtube')->default('#');
>>>>>>> 335ec19faa67341f8332e47d9289ac838f7d8e8f
            $table->string('path')->default('images/preference');
            $table->string('filename')->default('noimages.png');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('preferences');
    }
}
