<?php
namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Models\Genre;

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
            'like_count' => $this->like_count,
            'dislike_count' => $this->dislike_count,
            'visited_count' => $this->visited_count,
        ];
    }
}