<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValideAbsenceRequest extends FormRequest
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
            'is_valide' => 'required',
            'date_effet' => 'required',
            'comment_demande' => 'nullable',
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'is_valide.required' => 'Etat est obligatoire',
            'date_effet.required' => 'La date d\'effet est obligatoire',
            'comment_demande.nullable' => 'Commentaire est obligatoire',
        ];
    }
}
