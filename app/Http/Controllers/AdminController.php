<?php

namespace App\Http\Controllers;

use App\Http\Requests\Account\CreateAdminRequest;
use App\Http\Requests\Account\UpdateAccountRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        return view('new_admin.page.admin.index');
    }

    public function checkEmail(Request $request)
    {
        $account = Admin::where('email', $request->email)->first();

        if($account) {
            return response()->json([
                'status' => false,
            ]);
        } else {
            return response()->json([
                'status' => true,
            ]);
        }
    }

    public function store(CreateAdminRequest $request)
    {
        $data   = $request->all();

        $parts = explode(" ", $request->full_name);

        if(count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        }
        else
        {
            $firstname = $request->full_name;
            $lastname = " ";
        }

        $data['ho_lot']     = $firstname;
        $data['ten']        = $lastname;
        $data['password']   = bcrypt($request->password);

        Admin::create($data);
    }

    public function getData()
    {
        $admin = Admin::all();

        return response()->json([
            'data'  => $admin,
        ]);
    }

    public function viewLogin()
    {
        return view('new_admin.page.auth.login');
    }

    public function actionLogin(Request $request)
    {
        $checkEmail = Auth::guard('admin')->attempt([
            'email'         => $request->username,
            'password'      => $request->password]);
        $checkPhone = Auth::guard('admin')->attempt([
            'so_dien_thoai' => $request->username,
            'password'      => $request->password]);
        if($checkEmail || $checkPhone){
            return response()->json(['status' => true]);
        } else {
            return response()->json(['status' => false]);
        }
    }

    public function logout()
    {
        Auth::guard('admin')->logout();

        return redirect()->back();
    }

    public function edit($id)
    {
        $admin = Admin::find($id);

        return response()->json([
            'status'    => true,
            'data'      => $admin,
        ]);
    }

    public function update(UpdateAccountRequest $request)
    {
        $login_id = Auth::guard('admin')->user();
        if($login_id->id == $request->id && $request->is_block == 1) {
            return response()->json(['status' => 0, 'message' => 'Bạn không thể tự hủy chính mình']);
        }
        $admin = Admin::find($request->id);

        $parts = explode(" ", $request->full_name);

        if(count($parts) > 1) {
            $lastname = array_pop($parts);
            $firstname = implode(" ", $parts);
        }
        else
        {
            $firstname = $request->full_name;
            $lastname = " ";
        }

        if(!$request->password) {
            $admin->ho_lot          = $firstname;
            $admin->ten             = $lastname;
            $admin->email           = $request->email;
            $admin->so_dien_thoai   = $request->so_dien_thoai;
            $admin->gioi_tinh       = $request->gioi_tinh;
            $admin->is_master       = $request->is_master;
            $admin->is_block        = $request->is_block;

            $admin->save();
        } else {
            $data               = $request->all();
            $data['ho_lot']     = $firstname;
            $data['ten']        = $lastname;
            $data['password']   = bcrypt($request->password);

            $admin->update($data);
        }

        return response()->json(['status' => 1]);
    }
}
