<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterCustomerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function prepareForValidation()
    {
        if(strpos($this->email, '+')) {
            $first = substr($this->email, 0, strpos($this->email, '+'));
            $last  = substr($this->email, strpos($this->email, '@'));
            $real_mail = $first . $last;
            $this->email     = $real_mail;
        }
        if(strpos($this->email, '.')) {
            $first = substr($this->email, 0, strpos($this->email, '@'));
            $first = str_replace('.', '', $first);
            $last  = substr($this->email, strpos($this->email, '@'));
            $real_mail = $first . $last;
        }

        $this->merge([
            'real_email' => $real_mail,
        ]);

    }

    public function rules()
    {
        return [
            'full_name'     => 'required|min:5',
            'phone'         => 'required|digits:10',
            'email'         => 'required|email',
            'real_email'    => 'required|unique:custommers,real_email',
            'sex'           => 'required|boolean',
            'dob'           => 'required|date',
            'password'      => 'required|min:6|max:30',
            're_password'   => 'required|same:password',
        ];
    }
}
