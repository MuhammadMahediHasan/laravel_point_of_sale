<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProductPricingModel extends Model
{
    protected $table="purchase_pricing";
    protected $primaryKey="purchase_pricing_id";
    protected $fillable=['product_main_id','purchase_product_id','total','pay','due'];


    // public function purchase_main_validation()
    // {
    // 	return [
    // 		"product_main_id"=>'required',
    // 		"purchase_product_id"=>'required',
    // 		"total"=>'required',
    // 		"pay"=>'required',
    // 		"due"=>'required',
    // 	];
    // }
}
