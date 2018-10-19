<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    protected $table = 'wards';

    protected $fillable = [
        'ward_id',
        'name',
        'type',
        'location',
        'district_id',
    ];

    public function district()
    {
        return $this->hasOne('App\Models\District', 'ward_id', 'district_id');
    }
}
