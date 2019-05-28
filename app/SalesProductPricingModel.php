<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProductPricingModel extends Model
{
    protected $table = "sales_product_pricing";
    protected $primaryKey = "sales_product_pricing_id";
    protected $fillable = ['sales_main_id','sales_product_id','sales_total','sales_pay','sales_due'];
}
