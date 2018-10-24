<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';

    protected $fillable = [
        'name',
        'prefix',
        'province_id',
    ];

    public function province()
    {
        return $this->hasOne('App\Models\Province');
    }

    public function ward()
    {
        return $this->hasOne('App\Models\Ward');
    }

    public function street()
    {
        return $this->hasOne('App\Models\Street');
    }
}
