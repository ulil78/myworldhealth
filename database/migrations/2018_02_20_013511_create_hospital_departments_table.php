<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHospitalDepartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hospital_departments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_id')->unsigned();
            $table->foreign('hospital_id')->references('id')->on('hospitals');
            $table->string('name');
            $table->string('slug');
            $table->text('description');
            $table->string('doctor');
            $table->string('doctor_title');
            $table->string('path')->default('images/hospital/');
            $table->string('filename')->default('noimages.png');
            $table->enum('status', ['true', 'false', 'banned'])->default('true');
            $table->text('notes')->nullable();
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
        Schema::dropIfExists('hospital_departments');
    }
}
