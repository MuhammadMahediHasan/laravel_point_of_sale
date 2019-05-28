<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTemplateModel extends Model
{
    protected $table="product_template";
    protected $primaryKey="product_id";
    protected $fillable=['product_name','product_code','category_name','sub_category_name','brand_name','product_cost','product_mrp','product_tax','product_description','product_status','product_image'];


    public function product_validation()
    {
    	return[
            "product_name"=>'required',
    		"product_code"=>'required',
	    	"category_name"=>'required',
	    	"sub_category_name"=>'required',
	    	"brand_name"=>'required',
	    	"product_cost"=>'required|integer',
	    	"product_mrp"=>'required|integer',
	    	"product_tax"=>'required',
	    	"product_description"=>'required',
	    	"product_status"=>'required',
	    	"product_image"=>'required'
    	];
    	
    }
}
