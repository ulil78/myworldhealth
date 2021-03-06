<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdditionalServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('additional_services', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('hospital_program_id')->unsigned();
            $table->foreign('hospital_program_id')->references('id')->on('hospital_programs');
            $table->string('name');
            $table->float('price', 8, 2);
            $table->text('description');
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
        Schema::dropIfExists('additional_services');
    }
}
