<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideogameCreate extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => 'required',
            'developer' => 'required',
            'tags' => 'required'
        ];
    }
}
