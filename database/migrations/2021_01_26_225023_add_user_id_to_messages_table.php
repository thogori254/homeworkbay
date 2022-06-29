<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUserIdToMessagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('messages', function (Blueprint $table) {
            // 1. Create new column
            // You probably want to make the new column nullable
            $table->unsignedBigInteger('user_id')->unsigned()->nullable()->after('id');

            // 2. Create foreign key constraints
            $table->foreign('user_id')->references('id')->on('users')->onDelete('SET NULL');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('messages', function (Blueprint $table) {
            // 1. Drop foreign key constraints
            $table->dropForeign(['user_id']);

            // 2. Drop the column
            $table->dropColumn('user_id');
        });
    }
}
