<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchaseStockModel extends Model
{
    protected $table="purchase_stock";
    protected $primaryKey="stock_id";
    protected $fillable=['purchase_id','product_id','product_stock_code','stock_status'];
}
