<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFourthCatgoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fouth_catgories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('thrid_category_id')->unsigned();
            $table->foreign('thrid_category_id')->references('id')->on('thrid_catgories');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->enum('status', ['true', 'false'])->default('true');
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
        Schema::dropIfExists('fouth_catgories');
    }
}
