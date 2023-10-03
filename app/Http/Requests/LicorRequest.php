<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LicorRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
                'nombre' => 'required|max:20|min:3',
                'descripcion' => 'required|max:100|min:3',
                'precio' => 'required|numeric|between:100.0,10000'
        ];
    }
}
