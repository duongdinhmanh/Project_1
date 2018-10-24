<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\District;
use App\Models\Ward;
use Request;

class AjaxController extends Controller
{
    public function getDistrict($id)
    {
        $district = District::where('province_id', $id)->get();

        $output = ' ';
        foreach ($district as $row) {
            $output .= '<option value="' . $row->id . '">' . $row->name . '</option>';
        }
        return $output;
    }

    public function getWard(Request $request, $districtid)
    {
        $districtWard = Ward::where('district_id', $districtid)->get();

        $outputward = ' ';
        foreach ($districtWard as $ward) {
            $outputward .= '<option value="' . $ward->id . '">' . $ward->name . '</option>';
        }

        return $outputward;
    }
}
