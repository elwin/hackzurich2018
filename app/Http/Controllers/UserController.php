<?php

namespace App\Http\Controllers;

use App\Respoitories\StreetNameRepository;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return User::all();
    }

    public function show(User $user)
    {
        return $user;
    }

    public function create(Request $request)
    {
        $user = User::create($request->input());

        return $user;
    }
}
