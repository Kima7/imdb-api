<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WatchListRequest extends FormRequest
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
            'movie_id' => ['required', 'integer', 'exists:App\Models\Movie,id'],
            'watched' => ['boolean'],
        ];
    }

    public function prepared()
    {
        $validated = $this->validated();
        $validated['user_id'] = $this->user()->id;

        if (!$this->filled('watched')) {
            $validated['watched'] = false;
        }

        return $validated;
    }
}
