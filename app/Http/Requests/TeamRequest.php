<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class TeamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name' => 'required',
            'city' => 'required'
        ];
    }

}
