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
            'filters.name' => 'string|max:255',
            'filters.price_min' => 'numeric|min:0',
            'filters.price_max' => 'numeric|gte:filters.price_min',
            'sorts' => 'array',
            'sorts.price' => 'string|in:asc,desc',
            'sorts.created_at' => 'string|in:asc,desc',
            'per_page' => 'integer|min:1|max:100',
            'page' => 'integer|min:1',
        ];
    }
}
