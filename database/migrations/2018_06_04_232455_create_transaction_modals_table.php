<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionModalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_modals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('payment_id');
            $table->string('payment_status');
            $table->string('payment_method');
            $table->string('payer_email');
            $table->string('payer_first_name');
            $table->string('payer_last_name');
            $table->string('payer_phone');
            $table->string('payment_amount');
            $table->string('project_id');
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
        Schema::dropIfExists('transaction_modals');
    }
}
