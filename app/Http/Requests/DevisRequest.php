<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DevisRequest extends FormRequest
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
            'gender' => 'required',
            'email' => 'nullable',
            'phone_number' => 'required|min:8',
            'date' => 'nullable',
            'address' => 'required',
            'range' => 'nullable',
            'g-recaptcha-response' => 'required|captcha',
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
            'phone_number.required' => trans('error.phone_number'),
            'date.required' => trans('error.date'),
            'last_name.required' => trans('error.last_name'),
            'gender.required' => trans('error.gender'),
            'address.required' => trans('error.address'),
            'g-recaptcha-response.required' => trans('error.g-recaptcha-response'),
        ];
    }
}
