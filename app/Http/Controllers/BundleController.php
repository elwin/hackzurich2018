<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class BundleController extends Controller
{
    public function index(User $user)
    {
        return $user->bundles->load('trips');
    }
}
