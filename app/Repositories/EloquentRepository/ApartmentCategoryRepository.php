<?php
namespace App\Repositories\EloquentRepository;

use App\Models\ApartmentCategory;
use App\Repositories\EloquentRepository;

class ApartmentCategoryRepository extends EloquentRepository
{

    public function getModel()
    {
        return ApartmentCategory::class;
    }

    /**
     * @return mixed
     */
}
