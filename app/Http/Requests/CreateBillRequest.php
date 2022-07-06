<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateBillRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ship_address'   =>  'required',
            'ship_phone'     =>  'required|digits:10',
            'ship_fullname'  =>  'required',
        ];
    }
}
