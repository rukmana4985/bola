<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class OrderRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'customer_id'           => 'required|numeric',
            'seller_id'             => 'required|numeric',
            'number_invoice'        => 'required',
            'delivery_date'         => 'required',
            'order_date'            => 'required',
            'order_address'         => 'required',

        ];
    }

}
