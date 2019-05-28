<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseMainModel extends Model
{
    protected $table="purchase_main";
    protected $primaryKey="product_main_id";
    protected $fillable=['product_main_date','product_main_suplier'];


    public function purchase_main_validation()
    {
    	return [
    		"product_main_date"=>'required',
    		"product_main_suplier"=>'required'
    	];
    }
}
