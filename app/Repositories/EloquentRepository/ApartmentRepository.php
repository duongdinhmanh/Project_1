<?php
namespace App\Repositories\EloquentRepository;

use App\Models\Apartment;
use App\Repositories\EloquentRepository;
use App\Repositories\InterfaceRepository\ApartmentInterfaceRepository;

class ApartmentRepository extends EloquentRepository implements ApartmentInterfaceRepository
{

    public function getModel()
    {
        return \App\Models\Apartment::class;
    }
}
