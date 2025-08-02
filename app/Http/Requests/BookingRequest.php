<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
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
            'service_id' => 'required|exists:services,id',
            'booking_date' => 'required|date|after_or_equal:today',
            'notes' => 'nullable|string|max:1000',
        ];
    }

    public function messages(): array
    {
        return [
            'service_id.required' => 'Service is required',
            'service_id.exists' => 'Invalid service',
            'booking_date.required' => 'Booking date is required',
            'booking_date.date' => 'Invalid booking date',
            'booking_date.after_or_equal' => 'Booking date cannot be in the past',
            'notes.string' => 'Notes must be a string',
            'notes.max' => 'Notes must be less than 1000 characters',
        ];
    }
}
