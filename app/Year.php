<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Year extends Model
{
    //
    protected $table = "tbl_addyear";
    protected $fillable = ['year'];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
