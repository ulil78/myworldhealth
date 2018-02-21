<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnostics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invoice_id')->unsigned();
            $table->enum('patient', ['self', 'other'])->default('self');
            $table->string('name');
            $table->integer('age');
            $table->enum('gender', ['male', 'female']);
            $table->integer('weight');
            $table->integer('height');
            $table->text('diagnosis');
            $table->string('path')->default('images/patien');
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
        Schema::dropIfExists('diagnostics');
    }
}
