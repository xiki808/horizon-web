<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;

class MovieService
{
    private $httpClient;
    private $auth;

    public function __construct()
    {
        $this->httpClient = new \GuzzleHttp\Client(['base_uri' => "https://api.themoviedb.org/3/"]);
        $this->auth = [
          'Authorization' => 'Bearer ' . env('API_TOKEN'),
          'Accept'        => 'application/json',
        ];
    }

    public function getMoviesByVoteOrder($page)
    {
        $cachedMoviePage = Cache::get("movie_list_$page");
      
        if (isset($cachedMoviePage)) {
            $results = json_decode($cachedMoviePage, false);
        } else {
            $request = $this->httpClient->request('GET', "movie/top_rated?page=$page", ['headers' => $this->auth]);
  
            $response = json_decode($request->getBody()->getContents());

            $results = $response->results;

            Cache::put("movie_list_$page", json_encode($results), env('REDIS_EXPIRE'));
        }

        return $results;
    }

    public function getMovieById($id)
    {
        $cachedMovie = Cache::get("movie_$id");
        
        if ($cachedMovie) {
            $results = json_decode($cachedMovie, false);
        } else {
            $request = $this->httpClient->request('GET', "movie/$id", ['headers' => $this->auth]);
  
            $results = json_decode($request->getBody()->getContents());

            Cache::put("movie_$id", json_encode($results), env('REDIS_EXPIRE'));
        }

        return $results;
    }
}
