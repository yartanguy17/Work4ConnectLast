<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValideCongeRequest extends FormRequest
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
            'date_reprise_conge' => 'required',
            //'comment_demande' => 'required',
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
         'date_reprise_conge.required' => 'La date de reprise est obligatoire',
         //'comment_demande.required' => 'Commentaire est obligatoire',
        ];
    }
}