<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateBillRequest;
use App\Models\Bill;
use App\Models\ChiTietDonHang;
use App\Models\SanPham;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BillController extends Controller
{
    public function admin_index()
    {
        return view('new_admin.page.hoa_don.index');
    }

    public function getData()
    {
        $data = Bill::all();

        return response()->json([
            'bill'  => $data,
        ]);
    }

    public function store(CreateBillRequest $request)
    {
        DB::beginTransaction();
        try {
            $cutommer = Auth::guard('customer')->user();

            $bill = Bill::create([
                'ship_fullname'     => $request->ship_fullname,
                'ship_address'      => $request->ship_address,
                'ship_phone'        => $request->ship_phone,
                'customer_id'       => $cutommer->id,
                'customer_fullname' => $cutommer->full_name,
                'customer_phone'    => $cutommer->phone,
                'customer_email'    => $cutommer->email,
            ]);
            $check    = true;
            $tongTien = 0;
            $gioHang = ChiTietDonHang::whereNull('id_don_hang')->where('id_customer', $cutommer->id)->get();
            foreach($gioHang as $key => $value) {
                $sanPham = SanPham::find($value->id_san_pham);
                if($sanPham && $sanPham->is_open == true && $sanPham->so_luong >= $value->so_luong_mua) {
                    $donGia = $sanPham->don_gia_khuyen_mai = 0 ? $sanPham->don_gia_ban : $sanPham->don_gia_khuyen_mai;
                    $value->ten_san_pham = $sanPham->ten_san_pham;
                    $value->don_gia_mua  = $donGia;
                    $value->hinh_anh     = $sanPham->hinh_anh;
                    $value->id_don_hang  = $bill->id;
                    $value->save();

                    $tongTien += $donGia * $value->so_luong_mua;
                } else {
                    $check = false;
                }
            }
            $bill->bill_name  = "HDQL" . (158935 + $bill->id);
            $bill->bill_total = $tongTien;
            $bill->save();

            if($check) {
                DB::commit();
            } else {
                DB::rollBack();
            }
        } catch(Exception $e) {
            DB::rollBack();
        }
    }

    public function index()
    {
        return view('client_new.pages.list_order');
    }

    public function listOrder()
    {
        $cutommer = Auth::guard('customer')->user();
        $listOrder = Bill::join('chi_tiet_don_hangs', 'bills.id', 'chi_tiet_don_hangs.id_don_hang')
                            ->join('san_phams', 'chi_tiet_don_hangs.id_san_pham', 'san_phams.id')
                            ->join('danh_mucs', 'san_phams.danh_muc_id', 'danh_mucs.id')
                            ->where('id_customer', $cutommer->id)
                            ->select('chi_tiet_don_hangs.*', 'bills.bill_total', 'danh_mucs.ten_danh_muc')
                            ->get();

        return response()->json(['listOrder' => $listOrder]);
    }

    public function listBill()
    {
        $listBill = Bill::all();

        return response()->json(['listBill' => $listBill]);
    }
}
