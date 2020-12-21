<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSellItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sell_item', function (Blueprint $table) {
            $table->id();
            $table->integer('sell_id');
            $table->integer('product_id');
            $table->integer('amount');
            $table->double('unit_price');
            $table->double('total');

            $table->foreign('sell_id')->references('id')->on('sell');
            $table->foreign('product_id')->references('id')->on('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_item');
    }
}
