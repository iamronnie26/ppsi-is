<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TQ extends Model
{
    //
    protected $table    = "tbl_tq";
    protected $fillable = ['series_no_tq', 'date_tq', 'wiwo_tq', 'recruiter_tq', 'tq_result', 'tq_reason', 'tq_subreason'];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
