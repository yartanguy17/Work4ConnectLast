<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCongePrestataireRequest extends FormRequest
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
            //'prestataire_id' => 'required',
            'type_conge_id' => 'required',
            'date_demande_conge' => 'required',
            'date_return_conge' => 'required',
            'number_day' => 'required',
            //'motif_conge' => 'nullable',
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
         //'prestataire_id.required' => 'Prestataire est obligatoire.',
         'type_conge_id.required' => 'Type de congé est obligatoire.',
         'date_demande_conge.required' => 'Date début absence est obligatoire.',
         'date_return_conge.required' => 'Date fin est obligatoire.',
         'number_day.required' => 'Nombre de jours est obligatoire.',
         'motif_conge.nullable' => 'Motif est obligatoire.',
        ];
    }
}
