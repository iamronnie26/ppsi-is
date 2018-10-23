<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessPartner extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public function sites(){
    	return $this->hasMany('App\BusinessLocation','partner_id','id');
    }
}
