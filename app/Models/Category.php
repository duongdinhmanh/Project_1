<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $guarded = ['id'];

    public function CategoryApartment()
    {
        return $this->belongsToMany('App\Models\Apartment');
    }

    public static function scopeGetCategory($query)
    {
        return $query->where('status', 1);
    }

    public function childs()
    {
        return $this->hasMany('App\Models\Category', 'parent_id', 'id');
    }

    public function parent()
    {
        return $this->belongsTo('App\Models\Category', 'parent_id', 'id');
    }

    public function posts()
    {
        return $this->hasMany('App\Models\Post', 'category_id', 'id');
    }

    //scope result with parent_id = 0;
    public function scopeParentCategory($query)
    {
        return $query->where('parent_id', '=', 0);
    }
}
