<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantTypologyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurant_typology', function (Blueprint $b) {
            $b->unsignedBigInteger('user_id');
            $b->unsignedBigInteger('typology_id');

            $b->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $b->foreign('typology_id')->references('id')->on('typologies')->onDelete('cascade');

            $b->primary(['user_id', 'typology_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('restaurant_typology');
    }
}
