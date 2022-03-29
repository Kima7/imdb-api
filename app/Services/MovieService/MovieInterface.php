<?php
 
 namespace App\Services\MovieService;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;

interface MovieInterface
{
    public function getAllMovies();

    public function store(MovieRequest $request);

    public function show(Movie $movie);

    public function destroy(Movie $movie);

    public function allGenres();

    public function genreFilter($genre);
}