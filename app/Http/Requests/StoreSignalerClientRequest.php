<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSignalerClientRequest extends FormRequest
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
            'type_absence_id' => 'required',
            'date_demande' => 'required',
            'hour_start_time' => 'required',
            'contrat_id' => 'required',
            //'date_reprise' => 'nullable',
            //'motif_demande' => 'nullable',
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
            'type_absence_id.required' => 'Type absence est obligatoire.',
            'date_demande.required' => 'Date demande absence est obligatoire.',
            'hour_start_time.required' => 'Nombre d\' heure est obligatoire.',
            'contrat_id.required' => 'Contrat est obligatoire.',
            //'date_reprise.nullable' => 'Date reprise est obligatoire.',
            //'motif_demande.nullable' => 'Motif est obligatoire.',
        ];
    }
}
