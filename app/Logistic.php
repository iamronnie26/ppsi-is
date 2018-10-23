<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticableTrait;
use Illuminate\Database\Eloquent\SoftDeletes;

class Logistic extends Model
{

    protected $dates = ['deleted_at'];
    protected $table = 'applicants';

    protected $fiilable = ['series_no',
                           'created',
                           'fistname',
                           'middlename',
                           'lastname',
                           'contact_no',
                           'email',
                           'interviewer',
                           'contact_experience',
                           'business_partner',
                           'source',
                           'remarks',
                           'comment'];

    public function schoolIntern()
    {
        return $this->hasOne('App/School','id', 'id');
    }

    public function contactperson(){
        return $this->hasOne('App\ContactPerson','id','contact_id');
    }

    public function interview(){
    	return $this->hasOne('App/ContactPerson','id','id');
    }

}
