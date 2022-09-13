<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormationRequest extends FormRequest
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
            'title_formation' => 'required',
            'description_formation' => 'nullable',
            'type_formation_id' => 'required',
            'date_debut' => 'required',
            //'date_fin' => 'required',
            'cout_formation' => 'required',
            'document' => 'nullable',
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
            'title_formation.required' => 'Libellé est obligatoire.',
            'type_formation_id.required' => 'Type formation est obligatoire.',
            'date_debut.required' => 'Date de début est obligatoire.',
            //'date_fin.required' => 'Date de fin est obligatoire.',
            'cout_formation.required' => 'Coût formation est obligatoire.',
        ];
    }
}
