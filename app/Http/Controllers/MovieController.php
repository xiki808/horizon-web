<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{
    public function saveFavourite(Request $request)
    {
        $movie = $request->get('movie');

        User::find(Auth::id())->movies()->attach(Movie::find($movie));
    }
}
