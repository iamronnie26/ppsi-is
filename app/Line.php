<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Line extends Model
{
    //

    protected $table = 'tbl_line';
    protected $fillable = ['series_no_line', 'date_line', 'wiwo_line', 'recruiter_line', 'line_result', 'line_reason', 'line_subreason'];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
