<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuplierModel extends Model
{
    protected $table="suplier";
    protected $primaryKey="suplier_id";
    protected $fillable=['suplier_name','suplier_phone','suplier_address','suplier_account_no','suplier_opening_balance','suplier_image'];


    public function suplier_validation()
    {
    	return[
            "suplier_name"=>'required',
    		"suplier_phone"=>'required',
	    	"suplier_address"=>'required',
	    	"suplier_account_no"=>'required',
	    	"suplier_opening_balance"=>'required',
	    	"suplier_image"=>'required'
    	];
    	
    }
}
