<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\File;

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
        /*

        Aquí es donde van las reglas para los formulario

        */
        return [
                'nombre' => 'required|max:50|min:3',
                'descripcion' => 'required|max:100|min:10',
                'precio' => 'required|numeric|between:100,10000',
                'stock' => 'required|integer|between:1,1000',
                'archivo' => ['nullable'],
        ];
    }
}
