<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TsheetUpdateRequest extends FormRequest
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
            'description' => ['string'],
            'image' => ['string'],
            'completion' => ['string', 'max:50'],
            'startdate' => [''],
            'enddate' => [''],
            'status' => ['required', 'in:Pending,Rejected,Approved,Paid'],
            'user_id' => ['integer', 'exists:users,id'],
        ];
    }
}
