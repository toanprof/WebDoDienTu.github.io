<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateProductRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ten_san_pham'           => 'required|min:5',
            'slug_san_pham'          => 'nullable|min:5',
            'is_open'                => 'boolean',
            'hinh_anh'               => 'required|image',
        ];
    }
}
