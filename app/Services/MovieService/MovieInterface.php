<?php

namespace App\Services\MovieService;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\MovieRequest;
use App\Http\Requests\WatchListRequest;
use App\Models\Movie;
use App\Http\Requests\LikeRequest;
use Illuminate\Http\Request;

interface MovieInterface
{
    public function getAllMovies();

    public function store(MovieRequest $request);

    public function show(Movie $movie);

    public function destroy(Movie $movie);

    public function allGenres();

    public function genreFilter($genre);

    public function storeLike(LikeRequest $request);

    public function storeComment(CommentRequest $request);

    public function relatedMovies($movie_id);

    public function popularMovies();

    public function addToWatchList(WatchListRequest $request);

    public function getWatchList(Request $request);

    public function removeFromWatchList(WatchListRequest $request);
}
