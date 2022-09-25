<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $movies = [];
        $page = $request->has('page') ? $request->get('page') : 1;
        $filtered = '';
        
        if ($request->method() == 'GET') {
            $filtered = false;

            $cachedMoviePage = Cache::get("movie_page_$page");
            
            if (isset($cachedMoviePage)) {
                $movies = json_decode($cachedMoviePage, false);
            } else {
                $movies = Movie::paginate(20);

                Cache::put("movie_page_$page", json_encode($movies), env('REDIS_EXPIRE'));
            }
        } elseif ($request->method() == 'POST') {
            $filtered = true;

            $cachedMoviePage = Cache::get("movie_filtered_$page");

            if (isset($cachedMoviePage)) {
                $movies = json_decode($cachedMoviePage, false);
            } else {
                $movies = (new Movie())->filterByCurrentYear()->paginate(20);

                Cache::put("movie_filtered_$page", json_encode($movies), env('REDIS_EXPIRE'));
            }
        }
        
        return Inertia::render('Home/Index', [
            'movies' => $movies,
            'page' => $page,
            'filtered' => $filtered,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'isLoggedIn' => Auth::check(),
            'userMovies' => Auth::check() ? User::find(Auth::id())->movieIDs()->toArray() : []
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
