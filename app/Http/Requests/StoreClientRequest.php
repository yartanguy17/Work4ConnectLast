<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreClientRequest extends FormRequest
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
            'password' => 'required|string|min:8|confirmed',
            'phone_number' => 'required',
            'place_birth' => 'nullable',
            'gender' => 'nullable',
            'num_impot' => 'nullable',
            'nif' => 'nullable', 'string',
            'date_creation' => 'nullable',
            'personne_type' => 'required',
            'contact_name' => 'nullable',
            'ville_id' => 'required',
            'confirm_phone_number' => 'required|same:phone_number',
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
            'ville_id.required' => trans('error.ville_id'),
            'confirm_phone_number.required' => trans('error.confirm_phone_number'),
            'confirm_phone_number.same' => trans('error.confirm_phone_number.same'),
            'password.confirmed' => trans('error.password.confirmed'),
            'password.min' => trans('error.password.min'),
        ];
    }
}
