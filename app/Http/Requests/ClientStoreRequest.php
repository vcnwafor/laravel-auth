<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientStoreRequest extends FormRequest
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
            'businessname' => ['required','string','max:100'],
            'phone' => ['required', 'string', 'max:100'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string'],
            'country' => ['string'],
            'phone' => ['required', 'string'],
            'sex' => ['required', 'string'],
            'firstname' => ['required', 'string'],
            'middlename' => ['string'],
            'lastname' => ['required', 'string'],
            'website' => ['string'],
            'industry' => ['string'],
            'rcno' => ['string'],
            'image' => ['string'],
        ];
    }
}
