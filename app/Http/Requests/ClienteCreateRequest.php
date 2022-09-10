<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClienteCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nombre' => 'required|min:3|max:255',
            'apellido' => 'required|min:3|max:255',
            'correo' => 'required|email|max:255',
            'direccion' => 'required|min:5|max:255',
            'telefono' => 'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'nombre.required' => 'El :attribute es obligatorio',
            'apellido.required' => 'El :attribute es obligatorio',
            'correo.required' => 'El :attribute es obligatorio',
            'correo.email' => 'El :attribute no es una direccion de correo valida',
            'direccion.required' => 'La :attribute es obligatorio',
            'telefono.required' => 'El :attribute es obligatorio',
            'direccion.min'=>'La :attribute debe tener mas de 5 caracteres',
        ];
    }

    public function attributes()
    {
        return [
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'correo' => 'Correo',
            'direccion' => 'Direccion',
            'telefono' => 'Telefono',
        ];
    }
}
