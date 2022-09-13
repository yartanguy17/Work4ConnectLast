<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqCategoryRequest extends FormRequest
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
            'title_faq_cat' => 'required',
            'description_faq_cat' => 'nullable',
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
            'title_faq_cat.required' => trans('error.title_faq_cat'),
        ];
    }
}
