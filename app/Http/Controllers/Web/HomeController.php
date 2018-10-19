<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
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
        $province = Province::all()->pluck('name', 'id');

        return view('website', compact('province'));
    }
}
