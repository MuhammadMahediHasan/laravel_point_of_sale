<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasePricing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_pricing', function (Blueprint $table) {
            $table->bigIncrements('purchase_pricing_id');
            $table->integer('product_main_id');
            $table->integer('purchase_product_id');
            $table->string('total');
            $table->string('pay');
            $table->string('due');
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
        Schema::dropIfExists('purchase_pricing');
    }
}
