<?php

namespace App\Services\MovieService;

use App\Http\Requests\MovieRequest;
use App\Http\Resources\GenreResource;
use App\Http\Resources\MovieResource;
use App\Http\Requests\LikeRequest;
use App\Http\Resources\LikeResource;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Like;

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
        $movie = Movie::find($movie->id);
        $movie->visited_count +=1;
        $movie->save();
        return new MovieResource($movie);
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();
    }

    public function allGenres()
    {
        return GenreResource::collection(Genre::all());
    }

    public function genreFilter($genre)
    {
        $genreId = Genre::where('type', $genre)->first()->id;
        $filteredMovies = Movie::where('genre_id', $genreId)->get();
        return MovieResource::collection($filteredMovies);
    }

    public function storeLike(LikeRequest $request)
    {
        $validated = $request->validated();
        Like::create($validated);
        $movie = Movie::find($request->movie_id);
        if ($request->like)
            $movie->like_count += 1;
        else
            $movie->dislike_count += 1;
        $movie->save();
        return MovieResource::collection(Movie::all());
    }

    public function getLikes($userId)
    {
        $likes = Like::where('user_id', $userId)->get();
        return LikeResource::collection($likes);
    }
}
