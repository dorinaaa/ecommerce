<?php

namespace App;

use App\Models\User;
use App\Status;
use App\Address;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $fillable = [
        'date', 'total_price', 'transaction_id', 'user_id', 'address_id', 'status_id', 'transport_method_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function transport_method()
    {
        return $this->hasOne(TransportMethods::class);
    }

    public function orderDetails() {
        return $this->hasMany(OrderDetails::class, 'order_id');
    }
    public function address()
    {
        return $this->hasOne(Address::class, 'id');
    }
    public function status()
    {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}
