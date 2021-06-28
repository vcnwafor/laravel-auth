<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PersonnelUpdateRequest extends FormRequest
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
            'employeeno' => ['required', 'string', 'max:100'],
            'user_id' => ['integer', 'exists:users,id'],
            'firstname' => ['required', 'string', 'max:400'],
            'middlename' => ['string', 'max:400'],
            'lastname' => ['required', 'string', 'max:400'],
            'sex' => ['required', 'in:Male,Female'],
            'image' => ['string'],
            'skills' => ['string'],
            'phone' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:450'],
            'address' => ['required', 'string', 'max:500'],
            'designation' => ['string', 'max:400'],
            'country' => ['string', 'max:60'],
            'salary' => ['required', 'numeric', 'between:-999999999999.99,999999999999.99'],
            'maritalstatus' => ['required', 'in:Married,Single,Separated,Divorced'],
            'employmentstatus' => ['required', 'in:Active,Disengaged,Sacked'],
            'employmenttype' => ['required', 'in:Fulltime,Contract,Consultant'],
            'dob' => ['required'],
        ];
    }
}
