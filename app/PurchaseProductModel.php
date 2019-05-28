<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseProductModel extends Model
{
    protected $table="purchase_product";
    protected $primaryKey="purchase_product_id";
    protected $fillable=['product_main_id','purchase_product_name','purchase_product_quantity','purchase_product_unit_cost','purchase_product_sub_total'];


    // public function purchase_main_validation()
    // {
    // 	return [
    // 		"product_main_id"=>'required',
    // 		"purchase_product_name"=>'required',
    // 		"purchase_product_quantity"=>'required',
    // 		"purchase_product_unit_cost"=>'required',
    // 		"purchase_product_sub_total"=>'required',
    // 	];
    // }
}
