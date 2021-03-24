<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderDishservingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_dishserving', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id');
            $table->unsignedInteger('dish_id');
            $table->unsignedInteger('serving_id');
            $table->unsignedTinyInteger('count');
            $table->foreign('order_id')->references('id')->on('orders');
            $table->foreign(['dish_id', 'serving_id'])->references(['dish_id', 'serving_id'])->on('dish_serving');
            $table->primary(['order_id', 'dish_id', 'serving_id']);
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
        Schema::dropIfExists('order_dishserving');
    }
}
