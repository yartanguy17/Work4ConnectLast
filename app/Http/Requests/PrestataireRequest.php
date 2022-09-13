<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PrestataireRequest extends FormRequest
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
            'last_name' => 'nullable',
            'first_name' => 'required',
            'country' => 'required',
             'secteur_activite_id' => 'required',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string|min:8',
            'phone_number' => 'nullable',
            'birth_date' => 'nullable',
            'place_birth' => 'nullable',
            'gender' => 'nullable',
            'num_impot' => 'nullable',
            'nif' => 'nullable', 'string',
            'date_creation' => 'nullable',
            'personne_type' => 'nullable',
            'secteur_activite_id' => 'nullable',
            'ville_id' => 'nullable',
            'contact_name' => 'nullable',
            'confirm_phone_number' => 'nullable|same:phone_number',
            'g-recaptcha-response' => 'nullable|captcha',
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
            'email.required' => trans('error.email'),
            'country.required' => trans('Le pays est obligatoire.'),
            'secteur_activite_id.required' => trans('error.secteur_activite_id'),
            'phone_number.required' => trans('error.phone_number'),
            'personne_type.required' => trans('error.personne_type'),
            'secteur_activite_id.required' => trans('error.secteur_activite_id'),
            'password.required' => trans('error.password'),
            'confirm_phone_number.required' => trans('error.confirm_phone_number'),
            'confirm_phone_number.same' => trans('error.confirm_phone_number.same'),
            'password.confirmed' => trans('error.password.confirmed'),
            'password.min' => trans('error.password.min'),
            'ville_id.required' => trans('error.ville_id'),
            'g-recaptcha-response.required' => trans('error.g-recaptcha-response'),
        ];
    }
}
