<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class BusinessPartners extends Model
{
    use SoftDeletes;

    protected $dates = ['deleted_at'];
    protected $fillable = ['company_name', 'created'];

	protected $table = "business_partners";

	const CREATED_AT = 'created';
	
    public function sites(){
    	return $this->hasMany('App\BusinessLocation','partner_id','id');
    }
}

?>