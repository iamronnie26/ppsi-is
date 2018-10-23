<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    protected $dates = ['deleted_at'];

    protected $table = "users";
    protected $fillable = ['employee_id','fullname','department','designation','poc','username','password','usertype', 'user_image'];

    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
