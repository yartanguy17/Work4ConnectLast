<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOfferRequest extends FormRequest
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
            'title_offer' => 'required',
            'description_offer' => 'nullable',
            'job_type_id' => 'required',
            'vacancies' => 'required',
            'ville_id' => 'required',
            'type_contrat_id' => 'required',
            'body' => 'nullable',
            'attach_file' => 'nullable',
            'secteur_activite_id' => 'required',
            'expected_salary' => 'required',
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
            'title_offer.required' => trans('error.title_offer'),
            'job_type_id.required' => trans('error.job_type_id'),
            'vacancies.required' => trans('error.vacancies'),
            'ville_id.required' => trans('error.ville_id'),
            'type_contrat_id.required' => trans('error.type_contrat_id'),
            'secteur_activite_id.required' => trans('error.secteur_activite_id'),
            'expected_salary.required' => trans('error.expected_salary'),
        ];
    }
}
