<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Genre;

class Movie extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'cover_image',
        'genre_id',
        'like_count',
        'dislike_count',
        'visited_count',
    ];

    public function genre()
    {
        return $this->belongsTo(Genre::class);
    }
}
