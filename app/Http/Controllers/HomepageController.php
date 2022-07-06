<?php

namespace App\Http\Controllers;

use App\Models\DanhMuc;
use Illuminate\Support\Str;
use App\Models\SanPham;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index()
    {
        $sanPhamMoi     = SanPham::orderByDesc('id')->take(4)->get();

        $sanPhamBanChay = SanPham::take(4)->get();

        return view('client_new.pages.homepage', compact('sanPhamMoi', 'sanPhamBanChay'));
    }

    public function detailProduct($id)
    {
        $sanPham = SanPham::join('danh_mucs', 'san_phams.danh_muc_id', 'danh_mucs.id')
                            ->where('san_phams.id', $id)
                            ->select('san_phams.*', 'danh_mucs.ten_danh_muc')
                            ->first();

        return view('client_new.pages.detail_product', compact('sanPham'));
    }

    public function listProduct($id)
    {
        $danhMucCha = DanhMuc::find($id);
        if($danhMucCha) {
            // Nếu là danh mục con
            if($danhMucCha->id_danh_muc_cha > 0) {
                $listSanPham = SanPham::where('is_open', 1)
                                ->where('danh_muc_id', $danhMucCha->id)
                                ->get();
            } else {
                // Nó là danh mục cha. Tìm toàn bộ danh mục con
                $danhMucChaCon = DanhMuc::where('id_danh_muc_cha', $danhMucCha->id)
                                            ->get();
                $danhSach   = $danhMucCha->id;
                foreach($danhMucChaCon as $key => $value) {
                    $danhSach = $danhSach . ',' . $value->id;
                }
                $listSanPham = SanPham::whereIn('danh_muc_id', explode(",", $danhSach))->get();
            }

            return view('client_new.pages.product', compact('listSanPham', 'danhMucCha'));
        }
    }

}
