<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'tax_id_in_country' => 'required',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'nullable',
            'birth_date' => 'nullable',
            'place_birth' => 'nullable',
            'gender' => 'nullable',
            'nif' => 'nullable',
            'date_creation' => 'nullable',
            'ville_id' => 'nullable',
            'contact_name' => 'nullable',
            'personne_type' => 'nullable',
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

            'last_name.required' => 'Le nom est obligatoire.',
            'email.required' => 'L\'email est obligatoire.',
            'phone_number.required' => 'Le Numéro de téléphone est obligatoire.',
            'country.required' => 'Le pays est obligatoire.',
            'tax_id_in_country.required' => 'Le tax_id_in_country est obligatoire.',
            'personne_type.required' => 'Le Type utlisateur est obligatoire.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'confirm_phone_number.required' => 'Confirmation du numéro de téléphone  est obligatoire.',
            'confirm_phone_number.same' => 'Le numéro de téléphone et sa confirmation ne correspondent pas!',
            'password.confirmed' => 'La confirmation du mot de passe ne correspond pas.',
            'password.min' => 'Le mot de passe doit contenir au moins 8 caractères.',
            'ville_id.required' => 'La ville est obligatoire.',
            'g-recaptcha-response.required' => 'Vous devez cocher le reCAPTCHA',

            'last_name.required' => trans('error.last_name'),
            'email.required' => trans('error.email'),
           
            'personne_type.required' => trans('error.personne_type'),
            'password.required' => trans('error.password'),
            'confirm_phone_number.required' => trans('error.confirm_phone_number'),
            'confirm_phone_number.same' => trans('error.confirm_phone_number'),
            'password.confirmed' => trans('error.password'),
            'password.min' => trans('error.password'),
            'ville_id.required' => trans('error.ville_id'),
            'g-recaptcha-response.required' => trans('error.g-recaptcha-response'),

        ];
    }
}
