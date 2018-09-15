<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class TripController extends Controller
{
    public function index(User $user)
    {
        return $user->trips;
    }
}
