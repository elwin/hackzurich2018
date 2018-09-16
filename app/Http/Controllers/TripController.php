<?php

namespace App\Http\Controllers;

use App\Respoitories\PathRepository;
use App\Respoitories\WebRequest;
use App\Segment;
use App\Trip;
use App\User;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index(User $user)
    {
        return $user->trips;
    }

    public function show(Trip $trip)
    {
        return $trip->load('segments');
    }

    public function create(User $user, Request $request)
    {
        $source = $request->input('source');
        $destination = $request->input('destination');
        $via = $request->input('via');

        $trips = PathRepository::parseCollection($source, $destination, $user);

        return collect($trips)->each(function ($trip) {
            $trip->load('segments');
        });
    }
}
