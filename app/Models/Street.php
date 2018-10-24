<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Street extends Model
{
    protected $table = 'street';

    protected $fillable = [
        'prefix',
        'province_id',
        'district_id',
    ];

    public function district()
    {
        return $this->hasOne('App\Models\District');
    }

    public function province()
    {
        return $this->hasOne('App\Models\Province');
    }
}
