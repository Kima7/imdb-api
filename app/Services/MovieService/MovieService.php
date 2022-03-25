<?php
 
namespace App\Services\MovieService;

use App\Http\Requests\MovieRequest;
use App\Http\Resources\GenreResource;
use App\Models\Movie;
use App\Models\Genre;
use App\Http\Resources\MovieResource;

class MovieService implements MovieInterface
{

    public function getAllMovies() 
    {
        return MovieResource::collection(Movie::all());
    }

    public function store(MovieRequest $request)
    {
        return Movie::create($request->prepared());
    }

    public function show(Movie $movie)
    {
        return new MovieResource(Movie::find($movie->id));
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
    }

    public function allGenres()
    {
        return GenreResource::collection(Genre::all());
    }
    
}