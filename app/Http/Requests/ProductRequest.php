<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class ProductRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'product_category_id'   => 'required|numeric',
            'unit_id'               => 'required|numeric',
            'name'                  => 'required',
            'description'           => 'required',
            'price'                 => '',
            'stock'                 => 'required',
        ];
    }

}
