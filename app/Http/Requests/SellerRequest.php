<?php

namespace App\Http\Requests;

use App\Models\Seller;

use Illuminate\Foundation\Http\FormRequest;
class SellerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    public function rules()
    {
        $seller = Seller::find(request()->route('seller'));

        return [
            'gallery_id'          => 'required',
            'name'                => 'required'
        ];
    }

}
