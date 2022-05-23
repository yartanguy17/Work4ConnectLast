<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'last_name' => 'required|max:120',
            'first_name' => 'required|max:120',
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:6|confirmed',
            'phone_number' => 'required',
            'address' => 'nullable',
            'profile_picture' => 'image|nullable|mimes:jpeg,png,jpg|max:2048',
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
            'first_name.required' => trans('error.first_name'),
            'email.required' => trans('error.email'),
            'password.required' => trans('error.password'),
            'phone_number.required' => trans('error.phone_number'),
            'address.nullable' => trans('error.address'),
        ];
    }
}
