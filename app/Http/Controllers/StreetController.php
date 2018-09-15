<?php

namespace App\Http\Controllers;

use App\Respoitories\MapsRepository;
use Illuminate\Http\Request;

class StreetController extends Controller
{
    public function place(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        return [
            'streetname' => MapsRepository::streetName($latitude, $longitude)
        ];
    }
}
