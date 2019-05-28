<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchaseStock extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_stock', function (Blueprint $table) {
            $table->bigIncrements('stock_id');
            $table->string('purchase_id');
            $table->string('product_id');
            $table->string('product_stock_code');
            $table->string('stock_status');
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
        Schema::dropIfExists('purchase_stock');
    }
}
