<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;

class HomeController extends Controller
{
    public function change_lang($lang)
    {
        Session::put('website_language', $lang);

        return redirect()->back();
    }

    public function getIndex()
    {
        $province = Province::all()->pluck('name', 'province_id');
        $districts = District::all()->pluck('name', 'district_id');
        $province = Province::find(1)->district;
        dd($province);

        return view('website', compact('province', 'districts'));
    }
}
