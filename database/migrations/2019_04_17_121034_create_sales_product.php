<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_product', function (Blueprint $table) {
            $table->bigIncrements('sales_product_id');
            $table->string('sales_main_id');
            $table->string('product_name');
            $table->string('quantity');
            $table->string('unit_cost');
            $table->string('sub_total');
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
        Schema::dropIfExists('sales_product');
    }
}
