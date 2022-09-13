<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePrimeRequest extends FormRequest
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
            'date_primes' => 'required',
            'montant_prime' => 'required',
            'motif' => 'nullable',
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
            'date_primes.required' => 'Date du prime est obligatoire',
            'montant_prime.required' => 'Montant du prime est obligatoire',
            'motif.nullable' => 'Motif est obligatoire',
        ];
    }
}
