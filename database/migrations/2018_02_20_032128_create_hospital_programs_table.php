<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalProgramsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_programs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_department_id')->unsigned();
            $table->foreign('hospital_department_id')->references('id')->on('hospital_departments');
            $table->integer('first_category_id')->unsigned();
            $table->integer('second_category_id')->unsigned();
            $table->integer('thrid_category_id')->unsigned()->nullable();
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->float('price', 8, 2);
            $table->float('discount', 8, 2);
            $table->integer('duration')->default('1');
            $table->enum('status', ['true', 'false', 'banned'])->default('true');
            $table->text('notices')->nullable();
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
        Schema::dropIfExists('hospital_programs');
    }
}
