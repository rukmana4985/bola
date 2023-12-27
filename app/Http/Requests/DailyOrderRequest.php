<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class DailyOrderRequest extends FormRequest
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
            'recomendation_date'    => 'required',
            'order_address'         => 'required',
        ];
    }

}
