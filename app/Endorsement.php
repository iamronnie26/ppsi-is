<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Endorsement extends Model
{

    protected $fillable = ['applicant_id','contact_id','site_id','status'];
    public function contactperson(){
        return $this->hasOne('App\ContactPerson','id','contact_id');
    }

    public function businesspartner(){
        return $this->hasOne('App\BusinessPartner','id','company_id');
    }

    public function applicant(){
        return $this->hasOne('App\Applicant','id','applicant_id');
    }

    public function site(){
        return $this->hasOne('App\SiteEndorsed','id','site_id');
    }

}
