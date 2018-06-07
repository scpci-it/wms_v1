<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LocationProduct extends Migration
{

    public function up()
    {
        Schema::create('location_product', function (Blueprint $table) {
            $table->integer('product_id');
            $table->integer('location_id');
            $table->integer('stocks');
        });
    }

    public function down()
    {
        Schema::dropIfExists('location_product');
    }
}
