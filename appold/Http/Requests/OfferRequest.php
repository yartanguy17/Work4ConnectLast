<?php

namespace App\Http\Requests;

use App\Models\PostDate;
use Illuminate\Foundation\Http\FormRequest;

class OfferRequest extends FormRequest
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

        $nb_poste = PostDate::all();
        $date = null;

        foreach ($nb_poste as $post) {
            $date = $post->nb_day_post;
        }

        return [
            'title_offer' => 'required',
            'description_offer' => 'nullable',

            'vacancies' => 'nullable',
            'country' => 'required',

            'total_experience' => 'nullable',
            'secteur_activite_id' => 'required',
            'web_site' => 'required',
            'logo' => 'nullable|file',
            'start_date' => 'nullable|date|after_or_equal:' . date('Y-m-d', strtotime('+' . $date . ' days')),
        ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array
     */
    public function messages()
    {

        $nb_poste = PostDate::all();
        $date = null;

        foreach ($nb_poste as $post) {
            $date = $post->nb_day_post;
        }
        return [
            'title_offer.required' => trans('error.title_offer'),

            'vacancies.nullable' => trans('error.vacancies'),
            'country.required' => trans('error.country'),

            'total_experience.nullable' => trans('error.total_experience'),
            'secteur_activite_id.required' => trans('error.secteur_activite_id'),
            'web_site.required' => trans('error.web_site'),
            'logo.required' => trans('error.logo'),
            'start_date.nullable' => trans('error.start_date') . ' ' . date('Y-m-d', strtotime('+' . $date . ' days')),
        ];
    }
}
