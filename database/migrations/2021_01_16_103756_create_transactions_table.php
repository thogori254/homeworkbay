<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('transaction_id',256);
            $table->string('payer_email',256);
            $table->string('payer_full_name',256);
            $table->string('currency',256);
            $table->string('amount',256);
            $table->string('payee_email',256);
            $table->dateTime('time_paid_created_at');
            $table->dateTime('time_paid_updated_at');
            $table->string('status',100);
            $table->string('reference_id',256);
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
        Schema::dropIfExists('transactions');
    }
}
