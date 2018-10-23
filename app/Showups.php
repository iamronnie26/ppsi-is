<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Showups extends Model
{
    //
    protected $table = "applicants";
    protected $fillable = ['series_no','date','time','lastname','firstname','middlename','contact_no','position_applying', 'contact_person', 'contact_experience', 'educational_attainment', 'work_status','last_year_attended', 'activity', 'business_partner', 'site_endorsed', 'endorse', 'ppsi', 'birthdate', 'email_address', 'street','city','province','nationality', 'gender', 'marital_status', 'course', 'school', 'year_graduation', 'remarks'];

    protected $dates = ['deleted_at'];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
