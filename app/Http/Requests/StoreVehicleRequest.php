<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreVehicleRequest extends FormRequest
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
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'member_id' => 'required|exists:members,id',
            'vehicle_number' => 'required|unique:vehicles',
            'vehicle_type' => 'required',
            'vehicle_brand' => 'required',
            'vehicle_color' => 'required',
            'parking_slot' => 'required|unique:vehicles',
            'ownership_document' => 'nullable|image|max:2048'
        ];
    }
}
