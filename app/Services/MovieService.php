<?php

namespace App\Services;

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

    public function getMoviesTopRated($page)
    {
        $request = $this->httpClient->request('GET', "movie/top_rated?page=$page", ['headers' => $this->auth]);
  
        $response = json_decode($request->getBody()->getContents());

        $results = $response->results;

        return $results;
    }
}
