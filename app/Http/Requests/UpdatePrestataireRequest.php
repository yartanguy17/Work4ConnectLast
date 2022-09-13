<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePrestataireRequest extends FormRequest
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
            'last_name' => 'required',
            'first_name' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable|string|min:8|confirmed',
            'phone_number' => 'nullable',
            'birth_date' => 'nullable',
            'place_birth' => 'nullable',
            'gender' => 'nullable',
            'num_impot' => 'nullable',
            'nif' => 'nullable', 'string',
            'date_creation' => 'nullable',
            'personne_type' => 'required',
            'secteur_activite_id' => 'required',
            'ville_id' => 'required',
            'contact_name' => 'nullable|string',
            'confirm_phone_number' => 'nullable|same:phone_number',
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
            'last_name.required' => trans('error.last_name'),
            'email.nullable' => trans('error.email'),
            'phone_number.required' => trans('error.phone_number'),
            'personne_type.required' => trans('error.personne_type'),
            'secteur_activite_id.required' => trans('error.secteur_activite_id'),
            'ville_id.required' => trans('error.ville_id'),
            'password.nullable' => trans('error.password'),
            'confirm_phone_number.required' => trans('error.confirm_phone_number'),
            'confirm_phone_number.same' => trans('error.confirm_phone_number.same'),
            'password.confirmed' => trans('error.password.confirmed'),
            'password.min' => trans('error.password.min'),
        ];
    }
}
