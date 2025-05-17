<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'filters' => 'array',
            'filters.*' => 'string',
            'sorts' => 'array',
            'sorts.*' => 'string',
            'per_page' => 'integer|min:1|max:100',
            'page' => 'integer|min:1',
        ];
    }
}
