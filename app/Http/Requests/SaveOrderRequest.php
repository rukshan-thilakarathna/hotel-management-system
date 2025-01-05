<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaveOrderRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     * 
     * @return bool
     */
    public function authorize()
    {
        return true; // Change this if you have specific authorization logic
    }

    /**
     * Get the validation rules that apply to the request.
     * 
     * @return array
     */
    public function rules()
    {
        $rules = [
            'order_number' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'order_type' => 'required|string|max:255',
            'room_number' => 'nullable|string|max:255',
            'service_charge' => 'nullable',
            'vat' => 'nullable',
            'menu' => 'required|array',
            'menu.*' => 'required|string|max:255',
            'quantity' => 'required|array',
            'quantity.*' => 'required|integer|min:1',
            'price' => 'required|array',
            'price.*' => 'required|numeric|min:0',
            'total_price' => 'required|numeric|min:0',
        ];

        // Add conditional validation rules if `room_number` is provided
        if ($this->has('room_number') && $this->input('room_number')) {
            $rules['booking_id'] = 'required|string|max:255';
            $rules['order_type'] = 'required|string|max:255|in:Room';
        }

        return $rules;
    }
}
