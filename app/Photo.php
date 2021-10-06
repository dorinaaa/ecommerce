<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{

    protected $table = 'photos';
    protected $fillable = ['name', 'path', 'product_id'];
}
