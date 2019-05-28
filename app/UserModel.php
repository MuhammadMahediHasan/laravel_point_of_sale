<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    protected $table="users";
    protected $primaryKey="id";
    protected $fillable=['name','email','email_verified_at','password','user_branch','user_address','user_status','user_image'];
    protected $hidden=['rememberToken'];

    public function user_validation()
    {
    	return[
            "name"=>'required',
	    	"email"=>'required|email',
	    	"password"=>'required|confirmed',
	    	"password_confirmation"=>'required',
	    	"user_branch"=>'required',
	    	"user_address"=>'required',
	    	"user_status"=>'required',
	    	"user_image"=>'required'
    	];
    	
    }

    public function user_validation_update()
    {
        return[
            "name"=>'required',
            "user_branch"=>'required',
            "user_address"=>'required',
            "user_status"=>'required',
            "user_image"=>'required'
        ];
        
    }
}
