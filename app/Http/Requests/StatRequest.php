<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StatRequest extends FormRequest
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
            'today_dead' => 'required',
            'today_detained' => 'required',
            'today_hurt' => 'required',
            'total_dead' => 'required',
            'total_detained' => 'required',
            'total_hurt' => 'required',
        ];
    }
}
