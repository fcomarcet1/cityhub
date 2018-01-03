<?php

namespace App\Service\Services;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
    
    protected $fillable=['service','question_no','option'];
}
