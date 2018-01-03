<?php

namespace App\Service\Services;

use Illuminate\Database\Eloquent\Model;

class ServicesFormFields extends Model
{
    protected $fillable=['service','banner_image','banner_heading','banner_paragraph','question1','question2','question3','question4','question5','question6','question7',];
}
