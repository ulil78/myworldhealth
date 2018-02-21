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
            $table->integer('hospital_departement_id')->unsigned();
            $table->foreign('hospital_departement_id')->references('id')->on('hospital_departments');
            $table->integer('four_category_id')->unsigned();
            $table->string('name');
            $table->string('slug');
            $table->string('description');
            $table->float('price', 8, 2);
            $table->integer('duration')->default('1');
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
        Schema::dropIfExists('hospital_programs');
    }
}
