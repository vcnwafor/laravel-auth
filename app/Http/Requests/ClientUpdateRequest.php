<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientUpdateRequest extends FormRequest
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
            'businessname' => ['required', 'string', 'max:100'],
            'firstname' => ['string', 'max:400'],
            'middlename' => ['string', 'max:400'],
            'lastname' => ['string', 'max:400'],
            'sex' => ['required', 'in:Male,Female'],
            'image' => ['string'],
            'phone' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:450'],
            'address' => ['string', 'max:500'],
            'website' => ['string', 'max:500'],
            'rcno' => ['string', 'max:500'],
            'industry' => ['string', 'max:400'],
            'country' => ['string', 'max:60'],
        ];
    }
}
