<?php
namespace App\Repositories\EloquentRepository;

use App\Models\SetCalendar;
use App\Repositories\EloquentRepository;
use App\Repositories\InterfaceRepository\SetCalendarInterfaceRepository;

class SetCalendarRepository extends EloquentRepository implements SetCalendarInterfaceRepository
{

    public function getModel()
    {
        return \App\Models\SetCalendar::class;
    }
}
