<?php

namespace App\Http\Requests;

use App\Models\Movie;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'genre' => ['required', 'string', Rule::in(array_keys(Movie::MOVIE_GENRES))],
        ];
    }
}
