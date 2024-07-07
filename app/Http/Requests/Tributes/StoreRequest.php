<?php

namespace App\Http\Requests\Tributes;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'author' => 'required|string|max:100',
            'body' => 'required|string|max:3000',
            'site_id' => 'required|integer|exists:sites,id',
        ];
    }
}
