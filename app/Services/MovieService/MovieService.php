<?php

namespace App\Services\MovieService;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\MovieRequest;
use App\Http\Resources\GenreResource;
use App\Http\Resources\MovieResource;
use App\Http\Requests\LikeRequest;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Like;

class MovieService implements MovieInterface
{

    public function getAllMovies()
    {
        return MovieResource::collection(Movie::orderBy('created_at','DESC')->get());
    }

    public function store(MovieRequest $request)
    {
        return Movie::create($request->prepared());
    }

    public function show(Movie $movie)
    {
        $movie = Movie::find($movie->id);
        $movie->visited_count += 1;
        $movie->save();
        $movie->load(['comments']);
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
        $validated = $request->prepared();
        Like::updateOrCreate(
            ['user_id' => $validated['user_id'], 'movie_id' => $validated['movie_id']],
            ['like' => $validated['like']]
        );
        return MovieResource::collection(Movie::all());
    }

    public function storeComment(CommentRequest $request)
    {
        return Comment::create($request->prepared());
    }

}
