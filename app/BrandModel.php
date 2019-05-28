<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    protected $table="brand";
    protected $primaryKey="brand_id";
    protected $fillable=['brand_name','brand_email','brand_phone','brand_address','brand_logo','brand_status'];

    public function brand_validation()
    {
    	return [
    		"brand_name"=>'required',
    		"brand_email"=>'required',
    		"brand_phone"=>'required',
    		"brand_address"=>'required',
    		"brand_logo"=>'required',
    		"brand_status"=>'required'
    	];
    }
}
