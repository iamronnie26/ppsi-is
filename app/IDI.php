<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IDI extends Model
{
    //
    protected $table    = "tbl_idi";
    protected $fillable = ['series_no_idi', 'date_idi', 'wiwo_idi', 'recruiter_idi', 'idi_result', 'idi_reason', 'idi_subreason'];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
