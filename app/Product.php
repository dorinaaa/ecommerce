<?php

namespace App;

use Illuminate\Support\Str;
use App\Favorite;
use App\Photo;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * @var string
     */
    protected $table = 'products';

    /**
     * @var array
     */
    protected $fillable = [
        'serial_no', 'name', 'model', 'year', 'description', 'manufacturer', 'color', 'front_camera', 'back_camera', 'ram',
        'storage', 'display_size',    'display_resolution', 'processor', 'battery', 'os', 'graphics_card', 'weight', 'price',
        'discount', 'total_quantity', 'is_active', 'category_id', 'image_path', 'label'
    ];

    public function category()
    {
        return $this->belongsTo('Category', 'category_id');
    }
    /**
     * @param $value
     */
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
    }

    // protected $fillable = ['name', 'price', 'label'];

    public function favorite()
    {
      return $this->hasOne(Favorite::class, 'id');
    }

    public function photos()
    {
      return $this->hasMany(Photo::class);
    }
}
