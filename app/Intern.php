<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intern extends Model
{

    protected $dates = ['deleted_at'];
    protected $table = "interns";
    protected $fillable = ['id_no','firstname', 'middlename', 'lastname', 'contact_no', 'course', 'ojt_hours', 'school_id', 'contact_id', 'created'];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'updated_at';

        
public function school(){
   return $this->hasOne('App\School','id','school_id');
}

public function contactperson(){
    return $this->hasOne('App\ContactPerson','id','contact_id');
}

public function contact_id_supervisor()
{
    return $this->hasOne('App\ContactPerson', 'id', 'contact_id');
}
}
