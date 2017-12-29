<?php

namespace App\Service\Join;

use Illuminate\Database\Eloquent\Model;

class ClientProducts extends Model
{
    protected $fillable=['product_name','quantity','price','shopid'];
}
