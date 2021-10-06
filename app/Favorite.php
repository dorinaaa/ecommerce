<?php

namespace App;

use App\Product;
use Illuminate\Database\Eloquent\Model;

class Favorite extends Model
{
    protected $fillable = ['user_id', 'product_id'];
    protected $with = ['product'];

    public function product() {
      return $this->belongsTo(Product::class);
    }
}