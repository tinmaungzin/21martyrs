<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Request;

class InformRequest extends FormRequest
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

        $rules = [
            'name' => 'required',
            'age' => 'required',
            'gender' => 'required',
            'state_id' => 'required',
            'address' => 'required',
            'occupation' => 'required',
//            'organization_name' => 'required',
            'detained_date' => 'required',
            'photo' => 'required',
            'informant_name' => 'required',
            'informant_association_with_victim' => 'required',
            'informant_phone' => 'required',
            'status' => 'required',
        ];

        if (Request::input('status') == 'detained') {
            $rules['reason_of_arrest'] = 'required';
        }
        if (Request::input('status') == 'dead') {
            $rules['reason_of_dead'] = 'required';
        }

        return $rules;


    }
}
