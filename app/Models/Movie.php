<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    const MOVIE_GENRE_COMEDY = 1;
    const MOVIE_GENRE_HORROR = 2;
    const MOVIE_GENRE_DRAMA = 3;
    const MOVIE_GENRE_ACTION = 4;
    const MOVIE_GENRE_THRILLER= 5;
    const MOVIE_GENRE_ROMANCE = 6;
    const MOVIE_GENRE_CRIME = 7;
    const MOVIE_GENRE_FANTASY = 8;
    const MOVIE_GENRE_DOCUMENTARY = 9;
    const MOVIE_GENRES = [
        self::MOVIE_GENRE_COMEDY => 'Comedy',
        self::MOVIE_GENRE_HORROR => 'Horror',
        self::MOVIE_GENRE_DRAMA => 'Drama',
        self::MOVIE_GENRE_ACTION => 'Action',
        self::MOVIE_GENRE_THRILLER => 'Thriller',
        self::MOVIE_GENRE_ROMANCE => 'Romance',
        self::MOVIE_GENRE_CRIME => 'Crime',
        self::MOVIE_GENRE_FANTASY => 'Fantasy',
        self::MOVIE_GENRE_DOCUMENTARY => 'Documentary'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'genre'
    ];
}
