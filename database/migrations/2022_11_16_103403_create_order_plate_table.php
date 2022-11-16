<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPlateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_plate', function(Blueprint $b) {
            $b->unsignedBigInteger('order_id');
            $b->unsignedBigInteger('plate_id');
            $b->unsignedTinyInteger('quantity');

            $b->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $b->foreign('plate_id')->references('id')->on('plates')->onDelete('cascade');

            $b->primary(['order_id', 'plate_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_plate');
    }
}
