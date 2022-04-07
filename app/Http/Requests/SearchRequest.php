<?php

namespace App\Http\Requests;

use App\Models\Genre;
use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
            'genre' => ['nullable', 'string'],
            'searchValue' => ['nullable', 'string'],
        ];
    }
    public function prepared()
    {
        $validated = $this->validated();

        if ($this->filled('genre')) {
            $validated['genre_id'] = Genre::where('type', '=', $this->genre)->first()->id;
            $validated['searchValue'] = strtolower($validated['searchValue']);
        }
        if ($this->filled('searchValue')) {
            $validated['searchValue'] = strtolower($validated['searchValue']);
        }

        return $validated;
    }
}
