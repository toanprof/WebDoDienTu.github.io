<?php

namespace App\Http\Requests\ChiTietNhapKho;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePriceChiTietNhapKho extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id'            =>  'required|exists:chi_tiet_nhap_khos,id',
            'don_gia_nhap'  =>  'required|numeric|min:1',
        ];
    }

    public function messages()
    {
        return [
            'required'     =>  ':attribute yêu cầu phải nhập',
            'exists'       =>  ':attribute không tồn tại trong hệ thống',
            'numeric'      =>  ':attribute phải là số',
            'min'          =>  ':attribute phải lớn hơn 1',
        ];
    }

    public function attributes()
    {
        return [
            'id'            =>  'Chi tiết nhập kho',
            'don_gia_nhap'  =>  'Số lượng nhập',
        ];
    }
}
