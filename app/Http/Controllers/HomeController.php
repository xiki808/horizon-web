<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;

        $cachedMoviePage = Cache::get("movie_page_$page");

        if (isset($cachedMoviePage)) {
            $movies = json_decode($cachedMoviePage, false);
        } else {
            $movies = Movie::paginate(20);

            Cache::put("movie_page_$page", json_encode($movies), env('REDIS_EXPIRE'));
        }
        
        return Inertia::render('Home/Index', [
            'movies' => $movies,
            'page' => intval($request->get('page')),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'isLoggedIn' => Auth::check()
        ]);
    }

    public function show($id)
    {
        return Inertia::render('Home/Show', [
            'movie' => Movie::find($id),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register')
        ]);
    }
}
