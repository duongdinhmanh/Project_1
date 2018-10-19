<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';

    protected $fillable = [
        'province_id',
        'name',
        'type',
    ];

    public function district()
    {
        return $this->hasMany('App\Models\District', 'district_id', 'province_id');
    }
}
