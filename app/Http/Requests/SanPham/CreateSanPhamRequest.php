<?php

namespace App\Http\Requests\SanPham;

use Illuminate\Foundation\Http\FormRequest;

class CreateSanPhamRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'ma_san_pham'               => 'required|min:5|unique:san_phams,ma_san_pham',
            'ten_san_pham'              => 'required|min:5|unique:san_phams,ten_san_pham',
            'slug_san_pham'             => 'required|min:5|unique:san_phams,slug_san_pham',
            'is_open'                   => 'required|boolean',
            'don_gia_ban'               => 'required|numeric|min:0',
            'don_gia_khuyen_mai'        => 'nullable|numeric|max:' . $this->don_gia_ban,
            'danh_muc_id'               => 'required|exists:danh_mucs,id',
            'hinh_anh'                  => 'required',
            'mo_ta_ngan'                => 'required',
            'mo_ta_chi_tiet'            => 'required',
        ];
    }

    public function messages()
    {
        return [
            'required'      =>  ':attribute không được để trống',
            'min'           =>  ':attribute quá nhỏ/ngắn',
            'boolean'       =>  ':attribute không phải Yes/No',
            'numeric'       =>  ':attribute không phải là số',
            'max'           =>  ':attribute quá lớn/dài',
            'exists'        =>  ':attribute không tồn tại',
            'unique'        =>  ':attribute đã tồn tại trong hệ thống',
        ];
    }

    public function attributes()
    {
        return [
            'ma_san_pham'               => 'Mã sản phẩm',
            'ten_san_pham'              => 'Tên sản phẩm',
            'slug_san_pham'             => 'Slug sản phẩm',
            'is_open'                   => 'Tình trạng',
            'don_gia_ban'               => 'Đơn giá bán',
            'don_gia_khuyen_mai'        => 'Đơn giá khuyến mãi',
            'danh_muc_id'               => 'Danh mục',
            'hinh_anh'                  => 'Hình ảnh',
            'mo_ta_ngan'                => 'Mô tả ngắn',
            'mo_ta_chi_tiet'            => 'Mô tả chi tiết',
        ];
    }
}
