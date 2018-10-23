<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    //
    protected $fillable = ["school_name","school_address"];

    protected $dates = ['deleted_at'];
    const CREATED_AT = 'created';

    public function applicants_in_school(){
    	return $this->hasMany('App\Applicant','school_id','id');
    }
}
