<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class PurchaseRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'supplier_id'           => 'required|numeric',
            'number_invoice'        => 'required',
            'purchase_date'            => 'required',
            'purchase_address'         => 'required',
        ];
    }

}
