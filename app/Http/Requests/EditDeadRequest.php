<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditDeadRequest extends FormRequest
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
            'informant_name' => 'required',
            'informant_association_with_victim' => 'required',
            'informant_phone' => 'required'

        ];
    }

    public function attributes()
    {
        return [
            'state_id' => 'state',
            'city_id' => 'city'

        ];
    }
}
