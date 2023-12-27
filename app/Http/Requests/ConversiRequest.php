<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ConversiRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'product_converted_id'   => 'required|numeric',
            'qty_converted'          => 'required',
            'product_convertion_id'   => 'required|numeric',
            'qty_convertion'          => 'required',
        ];
    }

}
