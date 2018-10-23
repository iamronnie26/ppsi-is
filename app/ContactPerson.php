<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactPerson extends Model
{

    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['firstname', 'middlename', 'lastname', 'dept_id', 'designation_id'];
	protected $table = "contact_people";

public function applicants(){
   	return $this->hasMany('App\Applicant','contact_id','id');
   }	

   public function department_contact_person(){
    return $this->hasOne('App\Department', 'id', 'dept_id');
}

public function designation_contact_person(){
    return $this->hasOne('App\Designation', 'id', 'designation_id');
}

   public function interviews(){
   	return $this->hasMany('App\Interview','interviewer_id','id');
   }

   public function interns(){
       return $this->hasMany('App\Intern','contact_id','id');
   }
}
