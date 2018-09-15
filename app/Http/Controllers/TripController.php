<?php

namespace App\Http\Controllers;

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
        $trip = Trip::make($request->input());

        $user->trips()->save($trip);

        $segments = factory(Segment::class, 10)->make();

        $trip->segments()->saveMany($segments);

        return $trip->load('segments');
    }
}
