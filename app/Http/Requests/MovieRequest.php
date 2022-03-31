<?php

namespace App\Http\Requests;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {

        return [
            'title' => ['required', 'string', 'min:2', 'max:100'],
            'description' => ['required', 'string','min:10', 'max:500'],
            'cover_image' => ['required', 'string'],
            'genre' => ['required', 'string','exists:App\Models\Genre,type']
        ];
    }

    public function prepared()
    {
        //echo($this);
        $validated = $this->validated();

        if ($this->filled('genre')) {
            $validated['genre_id'] = Genre::where('type','=',$this->genre)->first()->id;
            $validated['like_count'] = 0;
            $validated['dislike_count'] = 0;
            $validated['visited_count'] = 0;
        }

        return $validated;
    }
}
