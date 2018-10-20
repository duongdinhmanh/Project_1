<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Province;
use App\Models\Ward;

class HomeController extends Controller
{
    public function change_lang($lang)
    {
        Session::put('website_language', $lang);

        return redirect()->back();
    }

    public function getIndex()
    {
        $province = Province::all()->pluck('name', 'id');
        $districts = District::all()->pluck('name', 'id');
        $ward = Ward::all()->pluck('name', 'id');

        return view('website', compact('province', 'districts', 'ward'));
    }
}
