<?php

namespace App\Http\Controllers;

use App\Respoitories\StreetNameRepository;
use Illuminate\Http\Request;

class StreetController extends Controller
{
    public function place(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        return [
            'streetname' => StreetNameRepository::streetName($latitude, $longitude)
        ];
    }
}
