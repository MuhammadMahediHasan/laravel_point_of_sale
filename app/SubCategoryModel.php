<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategoryModel extends Model
{
    protected $table="sub_category";
    protected $primaryKey="sub_category_id";
    protected $fillable=['sub_category_name','category_name','sub_category_code','sub_category_description','sub_category_status'];

    public function sub_category_validation()
    {
    	return[
    		"sub_category_name"=>'required',
    		"category_name"=>'required',
    		"sub_category_code"=>'required',
    		"sub_category_description"=>'required',
    		"sub_category_status"=>'required'
    	];
    }
}
