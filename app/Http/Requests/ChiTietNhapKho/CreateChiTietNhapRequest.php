<?php

namespace App\Http\Requests\ChiTietNhapKho;

use Illuminate\Foundation\Http\FormRequest;

class CreateChiTietNhapRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_san_pham'   =>  'required|exists:san_phams,id',
        ];
    }

    public function messages()
    {
        return [
            'id_san_pham.exists'        => 'Sản phẩm không tồn tại!',
            'id_san_pham.required'      => 'Sản phẩm không tồn tại!',
        ];
    }
}
