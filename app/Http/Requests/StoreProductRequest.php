<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Prepare the data for validation.
     */
    protected function prepareForValidation(): void
    {
        // Filter out null/empty images before validation
        if ($this->has('images')) {
            $images = array_filter($this->input('images', []), function($image) {
                return !is_null($image);
            });
            $this->merge(['images' => count($images) > 0 ? $images : null]);
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|max:2048',
            'images' => 'nullable|array|max:10',
            'images.*' => 'max:2048',
            'old_price' => 'nullable|numeric|min:0',
            'new_price' => 'required|numeric|min:0',
        ];
    }

    public function messages(): array
    {
        return [
            'image.max' => 'The image must not exceed 2MB.',
            'images.*.max' => 'Each image must not exceed 2MB.',
        ];
    }
}
