<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesProductModel extends Model
{
    protected $table = "sales_product";
    protected $primaryKey = "sales_product_id";
    protected $fillable = ['sales_main_id','sales_product_name','sales_product_quantity','sales_product_unit_cost','sales_product_sub_total'];
}
