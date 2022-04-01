<?php
 
 namespace App\Services\MovieService;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Http\Requests\LikeRequest;

interface MovieInterface
{
    public function getAllMovies();

    public function store(MovieRequest $request);

    public function show(Movie $movie);

    public function destroy(Movie $movie);

    public function allGenres();

    public function genreFilter($genre);

    public function storeLike(LikeRequest $request);

    public function getAllLikes($userId);

    public function getLike($userId,$movieId);
}