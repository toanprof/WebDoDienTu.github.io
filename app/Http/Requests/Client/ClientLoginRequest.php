<?php

namespace App\Http\Requests\Client;

use Illuminate\Foundation\Http\FormRequest;

class ClientLoginRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'email'                 =>  'required|email',
            'password'              =>  'required',
            'g-recaptcha-response'  =>  'required|captcha',
        ];
    }
}
