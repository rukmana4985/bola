<?php

namespace App\Http\Requests;

use App\Models\Customer;

use Illuminate\Foundation\Http\FormRequest;
class CustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $customer = Customer::find(request()->route('customer'));

        return [
//            'username'          => 'required|unique:users,username,'.@$customer->user_id.',id',
            'seller_id'         => 'required|numeric',
            'gallery_id'        => 'required|numeric',
            'name'              => 'required',
            'address'           => 'required',
            'phone_number'      => 'required',
        ];
    }

}
