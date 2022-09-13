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
            'secteur_activite_id' => 'required',
            'country' => 'required',
             'city' => 'required',
           
            //  'web_site' => 'required',
           
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
            'secteur_activite_id.required' => trans('error.secteur_activite_id'),
            
             'country.required' => 'Country is required',
              'city.required' => 'City is required',
            
        //   'web_site.required' => trans('error.web_site'),
            
        ];
    }
}
