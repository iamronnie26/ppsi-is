<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SiteEndorsed extends Model
{
    //

    use SoftDeletes;
    
    protected $dates = ['deleted_at'];
    protected $table = "site_endorseds";
    protected $fillable = ['site_name'];


    public function companies(){
    	return $this->hasMany('App\BusinessLocation','site_id','id');
    }

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
