<?php

namespace App\Http\Controllers;

use App\Http\Requests\Cart\UpdateCartRequest;
use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChiTietDonHangController extends Controller
{

    public function getDetail($id)
    {
        $chiTiet = ChiTietDonHang::where('id_don_hang', $id)
                                 ->get();

        return response()->json([
            'chiTiet' => $chiTiet,
        ]);
    }

    public function index()
    {
        // user đang login
        // $user = Auth::guard('customer')->user();
        // Lấy những sản phẩm đang là giỏ hàng của user đó => get() => có nhiều sản phẩm đang định mua
        // $data = ChiTietDonHang::where('id_customer', $user->id)
        //                       ->whereNull('id_don_hang')
        //                       ->get();

        // $data = ChiTietDonHang::join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
        //                       ->select(
        //                           'chi_tiet_don_hangs.*',
        //                           'san_phams.ten_san_pham',
        //                           'san_phams.hinh_anh',
        //                           'san_phams.don_gia_ban',
        //                           'san_phams.don_gia_khuyen_mai',
        //                       )
        //                       ->where('id_customer', $user->id)
        //                       ->whereNull('id_don_hang')
        //                       ->get();
        // dd($data->toArray());

        // return view('new_client.page.cart', compact('data'));
        return view('client_new.pages.cart');
    }

    public function dataCart()
    {
        $user = Auth::guard('customer')->user();
        $data = ChiTietDonHang::join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
                              ->select(
                                'chi_tiet_don_hangs.*',
                                'san_phams.ten_san_pham',
                                'san_phams.hinh_anh',
                                'san_phams.don_gia_ban',
                                'san_phams.don_gia_khuyen_mai',
                              )
                              ->where('id_customer', $user->id)
                              ->whereNull('id_don_hang')
                              ->get();
        return response()->json(['chiTiet' => $data]);
    }

    public function store($id_san_pham)
    {
        // Lấy thông tin login => ko cần check() => đã qua middleware => đã chắc chắn là login
        $customer = Auth::guard('customer')->user();
        // Kiểm tra sản phẩm có hay không
        $sanPham = SanPham::find($id_san_pham);
        if($sanPham) {
            $chiTietDonHang = ChiTietDonHang::where('id_san_pham', $id_san_pham)
                                            ->where('id_customer', $customer->id)
                                            ->whereNull('id_don_hang')
                                            ->first();
            if($chiTietDonHang) {
                $chiTietDonHang->so_luong_mua++;
                $chiTietDonHang->save();
            } else {
                ChiTietDonHang::create([
                    'id_san_pham'   => $id_san_pham,
                    'id_customer'   => $customer->id,
                ]);
            }

            return response()->json([
                'status'    => true,
                'message'   => 'Đã thêm vào giỏ hàng!',
            ]);
        } else {
            return response()->json([
                'status'    => false,
                'message'   => 'Sản phẩm không tồn tại!',
            ]);
        }

    }

    public function removeCart($id)
    {
        // Lấy thông tin login => ko cần check() => đã qua middleware => đã chắc chắn là login
        $customer = Auth::guard('customer')->user();

        ChiTietDonHang::where('id', $id)
                      ->where('id_customer', $customer->id)
                      ->whereNull('id_don_hang')
                      ->first()->delete();
    }

    public function update(UpdateCartRequest $request)
    {
        $customer = Auth::guard('customer')->user();

        $chiTiet = ChiTietDonHang::where('id', $request->id)
                                 ->where('id_customer', $customer->id)
                                 ->whereNull('id_don_hang')
                                 ->first();
        $sanPham = SanPham::find($chiTiet->id_san_pham);
        if($sanPham) {
            $tonKho = $sanPham->so_luong;
            if($request->so_luong_mua > $tonKho) {
                $chiTiet->so_luong_mua = $tonKho;
                $chiTiet->save();

                return response()->json([
                    'status'    => false,
                    'message'   => 'Số lượng mua chỉ được ' . $tonKho,
                ]);
            } else {
                $chiTiet->so_luong_mua  = $request->so_luong_mua;
                $chiTiet->save();

                return response()->json([
                    'status'    => true,
                    'message'   => 'Đã cập nhật số lượng!',
                ]);
            }
        }
    }
}
