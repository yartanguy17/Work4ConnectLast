<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDemandeAbsenceRequest extends FormRequest
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
            'type_absence_id' => 'required',
            'date_demande' => 'required',
            'dure_absence' => 'required',
            'date_reprise' => 'required',
            'motif_demande' => 'required',
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
         'type_absence_id.required' => 'Type absence est obligatoire.',
         'date_demande.required' => 'Date demande absence est obligatoire.',
         'dure_absence.required' => 'Dure absence est obligatoire.',
         'date_reprise.required' => 'Date reprise est obligatoire.',
         'motif_demande.required' => 'Motif est obligatoire.',
        ];
    }
}