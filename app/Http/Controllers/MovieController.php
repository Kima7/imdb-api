<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Services\MovieService\MovieInterface;
use App\Http\Requests\LikeRequest;
use Illuminate\Http\Request;
use App\Http\Requests\WatchListRequest;

class MovieController extends Controller
{

    protected $movieService;

    public function __construct(MovieInterface $movieService)
    {
        $this->movieService = $movieService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->movieService->getAllMovies();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\MovieRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        return $this->movieService->store($request);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        return $this->movieService->show($movie);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $this->movieService->destroy($movie);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function genres()
    {
        return $this->movieService->allGenres();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function genreFilter($genre)
    {
        return $this->movieService->genreFilter($genre);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\LikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLike(LikeRequest $request)
    {
        return $this->movieService->storeLike($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\CommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeComment(CommentRequest $request)
    {
        return $this->movieService->storeComment($request);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function relatedMovies($movie_id)
    {
        return $this->movieService->relatedMovies($movie_id);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popularMovies()
    {
        return $this->movieService->popularMovies();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\WatchListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function addToWatchList(WatchListRequest $request)
    {
        return $this->movieService->addToWatchList($request);
    }

    /**
     * Display a listing of the resource.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function getWatchList(Request $request)
    {
        return $this->movieService->getWatchList($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Requests\WatchListRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function removeFromWatchList(WatchListRequest $request)
    {
        return $this->movieService->removeFromWatchList($request);
    }
}
