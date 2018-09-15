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
        $trip1 = Trip::make($request->input());
        $trip2 = Trip::make($request->input());

        $user->trips()->saveMany([$trip1, $trip2]);

        $segments1 = PathRepository::parse(
            $request->input('source'),
            $request->input('destination')
        );

        $segments2 = PathRepository::parse(
            $request->input('source'),
            $request->input('destination')
        );

        $trip1->segments()->saveMany($segments1);
        $trip2->segments()->saveMany($segments2);

        return [
            $trip1->load('segments'),
            $trip2->load('segments')
        ];
    }
}
