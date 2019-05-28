<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    protected $table="category";
    protected $primaryKey="category_id";
    protected $fillable=['category_name','category_code','category_description','category_status'];


    public function category_validation()
    {
    	return[
            "category_name"=>'required',
    		"category_code"=>'required',
	    	"category_description"=>'required',
	    	"category_status"=>'required'
    	];
    }
}
