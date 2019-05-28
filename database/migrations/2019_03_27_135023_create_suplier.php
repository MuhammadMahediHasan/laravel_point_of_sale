<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuplier extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suplier', function (Blueprint $table) {
            $table->bigIncrements('suplier_id');
            $table->string('suplier_name');
            $table->string('suplier_phone');
            $table->string('suplier_address');
            $table->string('suplier_account_no');
            $table->string('suplier_opening_balance');
            $table->string('suplier_image');
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
        Schema::dropIfExists('suplier');
    }
}
