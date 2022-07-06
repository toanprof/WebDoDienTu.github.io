<?php

namespace App\Http\Requests\ChiTietNhapKho;

use Illuminate\Foundation\Http\FormRequest;

class DeleteChiTietNhapKhoRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'    =>  'required|exists:chi_tiet_nhap_khos,id',
        ];
    }

    public function messages()
    {
        return [
            'id.exists'        => 'Sản phẩm không tồn tại!',
            'id.required'      => 'Sản phẩm không tồn tại!',
        ];
    }
}
