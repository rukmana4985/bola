<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
class SupplierRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        return [
            'name'      => 'required|unique:suppliers,name,'.request()->route('supplier').',id',
            'address'   => 'required',
        ];
    }

}
