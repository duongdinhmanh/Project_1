<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SetCalendar extends Model
{
    protected $table = 'set_calendars';

    protected $fillable = [
        'customer_id',
        'apartment_id',
        'name',
        'phone',
        'address',
        'email',
        'time',
        'note',
        'status',
    ];
}
