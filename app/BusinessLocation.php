<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BusinessLocation extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    public function site(){
    	return $this->hasOne('App\SiteEndorsed','id','site_id');
    }

    public function businessPartner(){
    	return $this->hasOne('App\businessPartner','id','partner_id');
    }
}
