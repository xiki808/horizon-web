<?php

namespace Database\Seeders;

use App\Services\MovieService;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(MovieService $movieService)
    {
        for ($i=1; $i <= 5; $i++) {
            $movies = $movieService->getMoviesTopRated($i);

            foreach ($movies as $movie) {
                DB::table('movies')->insert([
                    'title' => $movie->title,
                    'release_date' => Carbon::parse($movie->release_date),
                    'vote_average' => $movie->vote_average,
                    'vote_count' => $movie->vote_count,
                    'poster_path' => $movie->poster_path,
                    'overview' => $movie->overview,
                    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                ]);
            }
        }
    }
}
