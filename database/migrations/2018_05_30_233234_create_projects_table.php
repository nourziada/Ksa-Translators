<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('doc_language');
            $table->string('tran_language');
            $table->string('doc_content');
            $table->text('notes');
            $table->string('recivied_date');
            $table->string('payment_method')->nullable();
            $table->text('documents');
            $table->string('coupon')->nullable();
            $table->string('user_id');
            $table->string('status')->default(1);
            $table->string('price')->nullable();
            $table->text('trans_documents')->nullable();
            $table->datetime('reply_at')->nullable();
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
        Schema::dropIfExists('projects');
    }
}
