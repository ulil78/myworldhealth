<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecondCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('second_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('first_category_id')->unsigned();
            $table->foreign('first_category_id')->references('id')->on('first_categories');
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
        Schema::dropIfExists('second_categories');
    }
}
