<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnseignantRequest extends FormRequest
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
            'name'=>'string|required',
            'prenom'=>'string',
            'numero'=>'integer',
            'matricule'=>'string',
            'date_naissance'=>'nullable',
            'sexe'=>'string',
            'situation'=>'string',
            'statut'=>'string',
            'email'=>'nullable',
            'password'=>'nullable',
            'photo'=>'nullable',
        ];
    }
}
