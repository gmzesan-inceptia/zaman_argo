<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'customer_name' => 'required|string|min:3|max:100',
            'customer_phone' => 'required|string|min:10|max:20',
            'customer_address' => 'required|string|min:10|max:500',
            'product_title' => 'required|string',
            'product_price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1|max:100',
            'note' => 'nullable|string|max:500',
            'payment_method' => 'required|in:manual-bkash,cod',
            'manual_number' => 'required_if:payment_method,manual-bkash|nullable|string|min:10|max:20',
            'transaction_id' => 'required_if:payment_method,manual-bkash|nullable|string|min:5|max:50',
        ];
    }
}
