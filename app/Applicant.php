<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Applicant extends Model
{


    use SoftDeletes; 
    
    protected $dates = ['deleted_at'];

     protected $table = "applicants";
     protected $fillable = ['series_no',
                            'created',
                            'lastname',
                            'firstname',
                            'middlename',
                            'contact_no',
                            'position_applying', 
                            'contact_id',
                            'contact_experience', 
                            'educational_attainment', 
                            'last_year_attended',
                            'work_status',
                            'multipleEndorse',
                            'endorse'];

    const CREATED_AT = 'created';

    public function endorsements(){
        return $this->hasMany('App\Endorsement','applicant_id','id');
    }
    
    public function contactperson(){
    	return $this->hasOne('App\ContactPerson','id','contact_id');
    }

    public function school(){
    	return $this->hasOne('App\School','id','school_id');
    }

    public function interview(){
    	return $this->hasOne('App\InterviewInfo','applicant_id','id');
    }

    public function interviewStatus(){
        return $this->hasOne('App\Interview','applicant_no','id');
    }

    public function businessPartner(){
        return $this->hasOne('App\BusinessPartner','id','business_partner');
    }

    public function interviewer(){
        return $this->hasOne('App\ContactPerson','id','interviewer_id');
    }

    public function siteEndorsed(){
        return $this->hasOne('App\SiteEndorsed','id','site_endorsed');
    }

    public function logistic_Applicant(){
    	return $this->hasOne('App\Applicant','id','id');
    }

    public function logistic_businessPartner(){
    	return $this->hasOne('App\BusinessPartners','id','id');
    }

}
