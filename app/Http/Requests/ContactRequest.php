<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'name' => 'required',
            'firstname' => 'required',
            'phone_number' => 'required',
            'email' => 'required',
            'subject' => 'required',
            'message' => 'required',
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
            'name.required' => trans('error.name'),
            'firstname.required' => trans('error.firstname'),
            'phone_number.required' => trans('error.phone_number'),
            'email.required' => trans('error.email'),
            'subject.required' => trans('error.subject'),
            'message.required' => trans('error.message'),
            'g-recaptcha-response.required' => trans('error.g-recaptcha-response'),
        ];
    }
}
