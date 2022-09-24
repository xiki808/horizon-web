<?php

namespace App\Http\Controllers;

use App\Services\MovieService;
use Inertia\Inertia;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index(MovieService $movieService, $page = 1)
    {
        $movies = $movieService->getMoviesByVoteOrder($page);
        
        return Inertia::render('Home/Index', [
            'movies' => $movies,
            'page' => intval($page),
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register')
        ]);
    }

    public function show(MovieService $movieService, $id)
    {
        $movie = $movieService->getMovieById($id);
        
        return Inertia::render('Home/Show', [
            'movie' => $movie,
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register')
        ]);
    }
}
