<?php

namespace App\Http\Controllers;

use App\Http\Requests\MovieRequest;
use App\Models\Movie;
use App\Services\MovieService\MovieInterface;
use Illuminate\Http\Request;
use App\Http\Requests\LikeRequest;

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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllLikes($userId)
    {
        return $this->movieService->getAllLikes($userId);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getLike($userId,$movieId)
    {
        return $this->movieService->getLike($userId,$movieId);
    }
}
