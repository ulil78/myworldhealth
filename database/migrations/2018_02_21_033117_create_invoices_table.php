<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_id');
            $table->integer('user_id')->unsigned();
            $table->integer('hospital_program_id')->unsigned();
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('interpreter_qty');
            $table->float('interpreter_amount', 8, 2);
            $table->integer('translation_med_document_qty');
            $table->float('translation_med_document_amount', 8, 2);
            $table->integer('transfer_arrival_id')->unsigned();
            $table->integer('transfer_arrival_type_id')->unsigned();
            $table->integer('transfer_return_id')->unsigned();
            $table->integer('transfer_return_type_id')->unsigned();
            $table->float('transfer_amount', 8, 2);
            $table->float('total_amount', 8, 2);
            $table->enum('payment_method', ['credit_card', 'bank_transfer'])->default('credit_card');
            $table->enum('status', ['paid', 'unpaid', 'confirm', 'finish', 'cancel'])->default('unpaid');
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
        Schema::dropIfExists('invoices');
    }
}
