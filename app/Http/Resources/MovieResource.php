<?php

namespace App\Http\Resources;

use App\Http\Resources\CommentResource;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Genre;
use App\Models\Like;
use App\Models\WatchList;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'cover_image' => $this->cover_image,
            'genre' => Genre::find($this->genre_id)->type,
            'like_count' => Like::where([['movie_id', $this->id], ['like', true]])->count(),
            'dislike_count' => Like::where([['movie_id', $this->id], ['like', false]])->count(),
            'visited_count' => $this->visited_count,
            'action' => Like::where([['movie_id', $this->id], ['user_id', $request->user()->id]])->first()?->like,
            'comments' => CommentResource::collection($this->whenLoaded('comments')),
            'watched' => WatchList::where([['movie_id', $this->id], ['user_id', $request->user()->id]])->first()?->watched,
        ];
    }
}
