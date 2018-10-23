<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Designation extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['designation', 'created'];

	protected $table = "designations";

	const CREATED_AT = 'created';
	
    public function withDesignation()
    {
    	return $this->hasMany('App\ContactPerson','designation_id','id');
    }
}
