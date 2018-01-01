<?php

namespace App\Service\user;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable=['name','phone_no','pincode','locality','address','city','state','landmark','alternate_no',];

    protected $dates = ['created_at'];

    public function user()
	{

	return $this->belongsTo('App\User');

	}
}


