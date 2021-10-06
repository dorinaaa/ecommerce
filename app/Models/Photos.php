<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Photos extends Model
{
    /**
     * @var string
     */
    protected $table = 'photos';

    /**
     * @var array
     */
    protected $fillable = ['name','path','product_id'];

    /**
     * @var array
     */
    protected $casts = [
        'product_id'    =>  'integer',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function photos()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
