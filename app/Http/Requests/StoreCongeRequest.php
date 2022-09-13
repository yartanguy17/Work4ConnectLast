<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCongeRequest extends FormRequest
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
            'prestataire_id' => 'required',
            'type_conge_id' => 'required',
            'date_demande_conge' => 'required',
            'number_day' => 'required',
            'date_return_conge' => 'required',
            'date_reprise_conge' => 'required',
            //'motif_conge' => 'required',
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
         'prestataire_id.required' => 'Prestataire est obligatoire.',
         'type_conge_id.required' => 'Type de congé est obligatoire.',
         'date_demande_conge.required' => 'Date début  est obligatoire.',
         'number_day.required' => 'Nombre de jours est obligatoire.',
         'date_return_conge.required' => 'Date de retour est obligatoire.',
         'date_reprise_conge.required' => 'Date de reprise est obligatoire.',
         //'motif_conge.required' => 'Motif est obligatoire.',
        ];
    }
}