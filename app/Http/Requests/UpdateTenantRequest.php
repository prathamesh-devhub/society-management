<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateTenantRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'nullable',
            'email' => 'required|email',
            'occupation' => 'nullable',
            'aadhaar_no' => 'nullable',
            'agreement_start' => 'required|date',
            'agreement_end' => 'required|date',
            'id_proof' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'agreement_copy' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'police_verification' => 'nullable|file|mimes:pdf,doc,docx,jpg,png|max:2048',
            'is_active' => 'required|boolean'
        ];
    }
}
