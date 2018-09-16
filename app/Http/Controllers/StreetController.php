<?php

namespace App\Http\Controllers;

use App\Respoitories\StreetNameRepository;
use App\Street;
use Illuminate\Http\Request;

class StreetController extends Controller
{
    public function index()
    {
        $streets = Street::orderBy('score', 'asc')->get();

        return view('index', compact('streets'));
    }

    public function place(Request $request)
    {
        $latitude = $request->input('latitude');
        $longitude = $request->input('longitude');

        return StreetNameRepository::streetName($latitude, $longitude);
    }
}
