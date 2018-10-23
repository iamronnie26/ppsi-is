<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InterviewInfo extends Model
{
    
    protected $fillable=["applicant_id","interviewer_id"];

    public function applicant(){
    	return $this->hasOne('App\Applicant','id','applicant_id');
    }

    public function interviewer(){
    	return $this->hasOne('App\ContactPerson');
    }

    public function businessPartner(){
    	return $this->hasOne('App\BusinessPartner','id','partner_id');
    }

    public function siteEndorsed(){
    	return $this->hasOne('App\SiteEndorsed','id','endorse_to_site_id');
    }
}
