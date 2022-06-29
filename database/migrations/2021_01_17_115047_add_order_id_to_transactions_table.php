<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrderIdToTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // 1. Create new column
            // You probably want to make the new column nullable
            $table->integer('order_id')->unsigned()->nullable()->after('id');

            // 2. Create foreign key constraints
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('transactions', function (Blueprint $table) {
            // 1. Drop foreign key constraints
            $table->dropForeign(['order_id']);

            // 2. Drop the column
            $table->dropColumn('order_id');
        });
    }
}
