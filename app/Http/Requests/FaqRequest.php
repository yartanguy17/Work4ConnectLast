<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaqRequest extends FormRequest
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
            'faq_category_id' => 'required',
            'question_faq' => 'required',
            'answer_faq'  => 'required',
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
            'faq_category_id.required' => trans('error.faq_category_id'),
            'question_faq.required' => trans('error.question_faq'),
            'answer_faq.required' => trans('error.answer_faq'),
        ];
    }
}
