<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $dates = ['deleted_at'];
    protected $table = 'roles';
    protected $fillable = ['name', 'description'];
    

    public function users(){
    	return $this->belongsToMany('App\User');
    }
}
