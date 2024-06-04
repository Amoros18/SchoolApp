<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EleveRequest extends FormRequest
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
            'matricule'=>'required|string',
            'nom'=>'required|string',
            'prenom'=>'nullable',
            'numero'=>'nullable',
            'age'=>'nullable',
            'sexe'=>'nullable',
            'date_naissance'=>'nullable',
            'lieu_naissance'=>'nullable',
            'statut_social'=>'nullable',
            'statut_familliale'=>'nullable',
            'classe'=>'nullable',
            'photo'=>'nullable',
        ];
    }
}
