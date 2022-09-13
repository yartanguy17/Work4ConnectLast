<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VilleRequest extends FormRequest
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
            'title_ville' => 'required',
            'region_id' => 'required',
            'description_ville' => 'nullable',
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
            'title_ville.required' => trans('error.title_ville'),
            'region_id.required' => trans('error.region_id'),
        ];
    }
}
