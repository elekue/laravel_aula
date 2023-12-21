<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumno extends FormRequest
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
            'nombre_apellido'=>'required|min:5|max:75',
            'edad'=>'required',
            'foto'=>'image'
        ];
    }

    public function messages(): array
    {
       return [
        'nombre_apellido.required' => 'Ikaslearen izena derrigorrezkoa da'
       ];
    }
}
