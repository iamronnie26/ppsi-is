<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['dept_id', 'dept_name', 'created'];
	protected $table = "departments";

	const CREATED_AT = 'created';
    
 	public function people_in_department(){
 		return $this->hasMany('App\ContactPerson','dept_id','id');
 	}
}
