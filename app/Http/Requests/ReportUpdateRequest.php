<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReportUpdateRequest extends FormRequest
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
            'project_id' => ['required', 'integer', 'exists:projects,id'],
            'actiondate' => [''],
            'user_id' => ['integer', 'exists:users,id'],
        ];
    }
}
