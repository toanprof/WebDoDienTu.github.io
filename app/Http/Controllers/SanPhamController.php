<?php

namespace App\Http\Controllers;

use App\Http\Requests\SanPham\CreateSanPhamRequest;
use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{

    public function autoComplete(Request $request)
    {
        $data = SanPham::select('ten_san_pham')
                       ->where('ten_san_pham', 'like', '%' . $request->ten_san_pham . '%')
                       ->get();

        return response()->json($data);
    }

    public function index()
    {
        return view('new_admin.page.san_pham.index');
    }

    public function getData()
    {
        // $sql = "SELECT `san_pham.*`, `danh_mucs.ten_danh_muc`
        //             FROM `san_phams` JOIN `danh_mucs`
        //                 on san_phams.danh_muc_id = danh_mucs.id";
        // all, get => arrary => foreach
        // first, find => obj
        $data = SanPham::join('danh_mucs', 'san_phams.danh_muc_id', 'danh_mucs.id')
                       ->select('san_phams.*', 'danh_mucs.ten_danh_muc')
                       ->get();
        return response()->json([
            'listSanPham'  => $data
        ]);
    }

    public function checkProuctId(Request $request)
    {
        // find, first: trả về 1 obj
        // all, get: trả về 1 array
        $sanPham = SanPham::where('ma_san_pham', $request->ma_san_pham)->first();

        if($sanPham) {
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateSanPhamRequest $request)
    {
        $data   = $request->all();

        SanPham::create($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function show(SanPham $sanPham)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function edit(SanPham $sanPham)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SanPham $sanPham)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SanPham  $sanPham
     * @return \Illuminate\Http\Response
     */
    public function destroy(SanPham $sanPham)
    {
        //
    }
}
