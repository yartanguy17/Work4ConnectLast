<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientConfirmTelRequest extends FormRequest
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
            'phone_number' => 'required',
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
            'phone_number.required' => trans('error.phone_number'),
            'confirm_phone.required' => trans('error.confirm_phone'),
            'confirm_phone_number.same' => trans('error.confirm_phone_number'),
        ];
    }
}
