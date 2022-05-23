<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContratRequest extends FormRequest
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
            'type_contrat' => 'required',
            'date_effet' => 'required',
            'date_fin' => 'nullable',
            'ville_id' => 'required',
            'daily_hourly_rate' => 'required',
            'working_day_week' => 'required',
            'nbreheure' => 'required',
            'working_description' => 'nullable',
            'pay_per_hour' => 'required',
            'type_versement' => 'required',
            'status' => 'required',
            'name_cnss' => 'required',
            'type_contrat_id' => 'required',
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
            'type_contrat_id.required' => trans('error.type_contrat_id'),
            'date_effet.required' => trans('error.date_effet'),
            'ville_id.required' => trans('error.ville_id'),
            'status.required' => trans('error.status'),
            'type_contrat.required' => trans('error.type_contrat'),
            'pay_per_hour.required' => trans('error.pay_per_hour'),
            'working_day_week.required' => trans('error.working_day_week'),
        ];
    }
}
