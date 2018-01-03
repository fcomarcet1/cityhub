<?php

namespace App\Service\Services;

use Illuminate\Database\Eloquent\Model;

class CabService extends Model
{
    protected $fillable=['purpose','duration','cab_type','date',];

     public function user()
	{

	return $this->belongsTo('App\User');

	}
}
