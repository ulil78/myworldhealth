<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThridCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thrid_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('second_category_id')->unsigned();
            $table->foreign('second_category_id')->references('id')->on('second_categories');
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
        Schema::dropIfExists('thrid_categories');
    }
}
