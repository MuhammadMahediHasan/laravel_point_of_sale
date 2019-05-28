<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesProductPricing extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales_product_pricing', function (Blueprint $table) {
            $table->bigIncrements('sales_product_pricing_id');
            $table->string('sales_main_id');
            $table->string('sales_product_id');
            $table->string('sales_total');
            $table->string('sales_pay');
            $table->string('sales_due');
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
        Schema::dropIfExists('sales_product_pricing');
    }
}
