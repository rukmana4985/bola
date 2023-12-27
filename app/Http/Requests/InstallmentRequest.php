<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class InstallmentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'order_id'      => 'required',
            'payment_date'  => 'required',
            'value'         => 'required',
        ];
    }

}
