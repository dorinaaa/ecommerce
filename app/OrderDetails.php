<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderDetails extends Model
{
    protected $table = 'order_details';
    public function product() {
        return $this->belongsTo(Product::class);
    }
}
