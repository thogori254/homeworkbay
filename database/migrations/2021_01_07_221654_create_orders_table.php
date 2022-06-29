<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title',256);
            $table->string('ac_level',256);
            $table->string('subject',256);
            $table->string('paper_type',256);
            $table->string('citation',256);
            $table->string('spacing',256);
            $table->string('deadline',256);
            $table->string('currency',50);
            $table->integer('number_of_pages');
            $table->integer('number_of_sources');
            $table->integer('number_of_powerpoints');
            $table->string('writer_category',100);
            $table->string('Total_price',256);
            $table->string('slug',100)->nullable();
            $table->text('instructions');
            $table->string('file')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
