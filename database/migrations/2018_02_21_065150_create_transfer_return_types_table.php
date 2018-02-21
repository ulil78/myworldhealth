<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransferReturnTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transfer_return_types', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('transfer_return_id')->unsigned();
            $table->integer('transfer_return_id')->refrences('id')->on('transfer_returns');
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
        Schema::dropIfExists('transfer_return_types');
    }
}
