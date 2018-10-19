<?php

namespace App\Http\Controllers;

class AjaxController extends Controller
{
    public function getDistrict($provinceId)
    {
        $provinceId = Province::find($provinceId)->district->pluck('name', 'district_id');
        foreach ($collection as $value) {
        }
    }
}
