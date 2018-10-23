<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receptionist extends Model
{

    protected $dates = ['deleted_at'];
   protected $table    = "applicants";
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
                          'recept_status',
                          'source'];

    const CREATED_AT = 'created';
    // const UPDATED_AT = 'modified';

    public function recept_contact_person(){
    	return $this->hasOne('App\ContactPerson','id','contact_id');
    }

    public function partner(){
        return $this->hasOne('App\BusinessPartner','id','business_partner');
    }

    public function site(){
        return $this->hasOne('App\SiteEndorsed','id','site_endorsed');
    }

    public function endorsements(){
        return $this->hasMany('App\Endorsement','applicant_id','id');
    }
}
