<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Apartment;
use App\Http\Resources\demoResource;

class DemoController extends Controller
{
    public function index()
    {
        $check = Apartment::first();

        return new demoResource($check);

        return demoResource::collection($check);

        return response()->json($check);
    }
}
