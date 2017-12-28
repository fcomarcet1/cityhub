<?php

namespace App\Service\Food;

use Illuminate\Database\Eloquent\Model;

class FoodIndex extends Model
{
    protected $fillable=['img_path','title','route']; //new service field
}
