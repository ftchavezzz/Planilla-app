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
            /*'puesto_id' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'dui' => 'required|string|max:255',
            'telefono_fijo' => 'required|string|max:255',
            'telefono_movil' => 'required|string|max:255',
            'fecha_ingreso' => 'date',
            'fecha_nacimiento' => 'required|date',
            'email' => 'email|max:255',
            'activo' => true,*/
        ];
    }
}
