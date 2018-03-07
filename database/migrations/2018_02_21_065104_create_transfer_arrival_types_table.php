<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferArrivalTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_arrival_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transfer_arrival_id')->unsigned();
            $table->foreign('transfer_arrival_id')->references('id')->on('transfer_arrivals');
            $table->string('name');
            $table->float('price', 8, 2);
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
        Schema::dropIfExists('transfer_arrival_types');
    }
}
