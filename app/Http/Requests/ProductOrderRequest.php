<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ProductOrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'product_id'            => 'required|numeric',
            'created_at'            => 'required',
            'value'                 => 'required|numeric',
        ];
    }

}
