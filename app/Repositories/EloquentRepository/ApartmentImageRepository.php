<?php
namespace App\Repositories\EloquentRepository;

use App\Models\ApartmentImage;
use App\Repositories\EloquentRepository;
use App\Repositories\InterfaceRepository\ApartmentImagefaceRepository;

class ApartmentImageRepository extends EloquentRepository implements ApartmentImagefaceRepository
{

    public function getModel()
    {
        return \App\Models\ApartmentImage::class;
    }

    /**
     * @return mixed
     */
    public function findProduct()
    {
        return $this->_model->Apartment;
    }
}
