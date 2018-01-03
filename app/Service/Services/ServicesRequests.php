<?php

namespace App\Service\Services;

use Illuminate\Database\Eloquent\Model;

class ServicesRequests extends Model
{
    protected $fillable=['service','user_id','name','phone_no','pincode','locality','address','city','state','landmark','alternate_no',];

    public function user()
	{

	return $this->belongsTo('App\User');

	}
}
