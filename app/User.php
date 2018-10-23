<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends \Eloquent implements Authenticatable
{
    
    use AuthenticableTrait;
    use SoftDeletes;
    
    protected $dates = ['deleted_at'];

    protected $fillable = ['employee_id', 
                           'contact_id', 
                           'designation_id', 
                           'department_id', 
                           'username', 
                           'password',
                           'company_id', 
                           'role',
                           'user_type', 
                           'user_image',
                           'created'];

    protected $table = "users";
    
    const CREATED_AT = 'created';
    //const UPDATED_AT = 'modified';

    public function employee(){
    	return $this->hasOne('App\ContactPerson','id','contact_id');
    }

    public function roles(){
    	return $this->hasMany('App\Role','id','role_id');
    }

    public function department_user(){
        return $this->hasOne('App\Department', 'id', 'department_id');
    }

    public function designation_user(){
        return $this->hasOne('App\Designation', 'id', 'designation_id');
    }

    public function business_partner_user(){
        return $this->hasOne('App\BusinessPartners', 'id', 'company_id');
    }

    public function interviews(){
        return $this->hasMany('App\InterviewInfo','interviewer_id','id');
    }
}
