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
        Schema::create('sell_items', function (Blueprint $table) {
            $table->id();
            $table->integer('sell_id');
            $table->integer('product_id');
            $table->integer('amount');
            $table->double('unit_price');
            $table->double('total');
            $table->timestamps();

            $table->foreign('sell_id')->references('id')->on('sells');
            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sell_items');
    }
}
