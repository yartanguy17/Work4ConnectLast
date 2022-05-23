<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RappelRequest extends FormRequest
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
            'phone_number' => 'required|min:8',
            'date_rapel' => 'nullable',
            'horaire_rapel' => 'nullable',
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
            'date_rapel.required' => trans('error.date_rapel'),
            'g-recaptcha-response.required' => trans('error.g-recaptcha-response'),
        ];
    }
}
