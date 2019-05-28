<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesMainModel extends Model
{
    protected $table = "sales_main";
    protected $primaryKey = "sales_main_id";
    protected $fillable = ['sales_main_date','sales_main_customer'];


    public function sales_main_validation()
    {
    	return[
    		"sales_main_date" => 'required',
    		"sales_main_customer" => 'required',
    	];
    }
}
