<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_product', function (Blueprint $table) {
            $table->bigIncrements('purchase_product_id');
            $table->integer('product_main_id');
            $table->string('purchase_product_name');
            $table->string('purchase_product_quantity');
            $table->string('purchase_product_unit_cost');
            $table->string('purchase_product_sub_total');
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
        Schema::dropIfExists('purchase_product');
    }
}
