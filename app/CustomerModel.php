<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    protected $table="customer";
    protected $primaryKey="customer_id";
    protected $fillable=['customer_name','customer_email','customer_phone','customer_address','customer_account_no','customer_opening_balance','customer_taxable','customer_image'];


    public function customer_validation()
    {
    	return[
            "customer_name"=>'required',
    		"customer_email"=>'required|email',
	    	"customer_phone"=>'required',
	    	"customer_address"=>'required',
	    	"customer_account_no"=>'required',
	    	"customer_opening_balance"=>'required',
    	];
    	
    }
}
