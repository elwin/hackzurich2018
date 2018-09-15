<?php

namespace App\Http\Controllers;

use App\Respoitories\MapsRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }
}
