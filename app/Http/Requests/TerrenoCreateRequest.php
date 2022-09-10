<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TerrenoCreateRequest extends FormRequest
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
           'foto' =>'nullable|mimes:jpeg,jpg,png',
           'area' =>'required|integer|min:1',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
           'direccion' =>'required|min:3|max:255',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
           'zona' =>'required|min:3|max:255',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
           'descripcion' =>'required|min:3|max:255',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
           'latitud' =>'required|numeric',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
           'longitud' =>'required|numeric',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
        ];
    }

    public function messages()
    {
        return [
            "foto.mimes"=>"La :attribute debe ser de tipo .jpeg .jpg .png",
            "area.required"=>"El :attribute es requerido",
            "direccion.required"=>"La :attribute es requerido",
            "zona.required"=>"La :attribute es requerido",
            "descripcion.required"=>"La :attribute es requerido",
            "latitud.required"=>"La :attribute es requerido",
            "longitud.required"=>"La :attribute es requerido",
        ];
    }
}
