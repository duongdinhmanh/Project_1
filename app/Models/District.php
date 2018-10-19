<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Districts extends Model
{
    protected $table = 'districts';

    protected $fillable = [
        'district_id',
        'name',
        'type',
        'location',
        'province_id',
    ];

    public function district()
    {
        return $this->hasOne('App\Models\District', 'district_id', 'province_id');
    }

    public function ward()
    {
        return $this->hasOne('App\Models\Ward', 'ward_id', 'district_id');
    }
}
