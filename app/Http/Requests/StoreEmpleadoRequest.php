<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEmpleadoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nombre' => 'required|string|max:255',
            'dui' => 'required|string|max:255',
            'telefono_fijo' => 'required|string|max:255',
            'telefono_mobile' => 'required|string|max:255',
            'fecha_ingreso' => 'required|date',
            'fecha_nacimiento' => 'required|date',
            'email' => 'required|email|max:255',
            'activo' => 'boolean'
        ];
    }
}
