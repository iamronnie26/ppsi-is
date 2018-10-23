<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Interview extends Model
{

    protected $dates = ['deleted_at'];

    protected $table = "interviews";
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
                            'work_status'];

    const CREATED_AT = 'created';

    public function interviewee(){
        return $this->hasOne('App\Applicant');
    }
 
    public function interviewer(){
        return $this->hasOne('App\ContactPerson');
    }
}
