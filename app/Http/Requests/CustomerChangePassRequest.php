<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CustomerChangePassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'password'      =>  'required|min:6|max:30',
            're_password'   =>  'required|same:password',
            'hash'          =>  'required|exists:custommers,hash_reset',
        ];
    }
}
