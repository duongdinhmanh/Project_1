<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $table = 'apartments';

    protected $fillable = [
        'id',
        'post_id',
        'name',
        'brand',
        'slug',
        'img_detail',
        'address',
        'bedrooms',
        'Toilet',
        'garage',
        'desc',
        'acreage',
        'price',
        'image',
        'video',
        'detail',
        'floor_plans',
        'features',
        'conditions',
        'map',
        'featured_product',
        'status',
    ];

    public function apartmentCategory()
    {
        return $this->belongsToMany('App\Models\Category');
    }

    public static function scopeGetApartments($query)
    {
        return $query->where('status', 1)->orderBy('id', 'DESC');
    }
}
