<?php
 
namespace App\Services\MovieService;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Http\Resources\MovieResource;

class MovieService implements MovieInterface
{

    public function getAllMovies() 
    {
        return MovieResource::collection(Movie::all());
    }

    public function store(MovieRequest $request)
    {
        Movie::create($request->validated());
    }

    public function show(Movie $movie)
    {
        return new MovieResource(Movie::find($movie)->first());
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
    }

    public function allGenres()
    {
        return Movie::MOVIE_GENRES;
    }
    
}