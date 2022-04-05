<?php

namespace App\Services\MovieService;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\MovieRequest;
use App\Http\Resources\GenreResource;
use App\Http\Resources\MovieResource;
use App\Http\Requests\LikeRequest;
use App\Http\Requests\WatchListRequest;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Movie;
use App\Models\Genre;
use App\Models\Like;
use App\Models\WatchList;
use Illuminate\Support\Facades\DB;

class MovieService implements MovieInterface
{

    public function getAllMovies()
    {
        return MovieResource::collection(Movie::orderBy('created_at', 'DESC')->get());
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
        return MovieResource::collection(Movie::orderBy('created_at', 'DESC')->get());
    }

    public function storeComment(CommentRequest $request)
    {
        return Comment::create($request->prepared());
    }

    public function relatedMovies($movie_id)
    {
        $genreId = Movie::where('id', $movie_id)->first()->genre_id;
        $relatedMovies = Movie::where([['genre_id', '=', $genreId], ['id', '!=', $movie_id]])->get();
        return MovieResource::collection($relatedMovies);
    }

    public function popularMovies()
    {
        return [];
    }

    public function addToWatchList(WatchListRequest $request)
    {
        $validated = $request->prepared();
        return WatchList::updateOrCreate(
            ['user_id' => $validated['user_id'], 'movie_id' => $validated['movie_id']],
            ['watched' => $validated['watched']]
        );
    }

    public function getWatchList(Request $request)
    {
        $movies = WatchList::select('movies.*')
            ->join('movies', 'movies.id', '=', 'watch_lists.movie_id')
            ->where('watch_lists.user_id', '=', $request->user()->id)
            ->get();
        return MovieResource::collection($movies);
    }
}
