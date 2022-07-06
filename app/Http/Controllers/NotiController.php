<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendNotiRequest;
use Illuminate\Http\Request;

class NotiController extends Controller
{
    public function index()
    {
        return view('new_admin.page.thong_bao.index');
    }

    public function active(SendNotiRequest $request)
    {
        broadcast(new \App\Events\NotiEvent($request->noti));

        return response()->json(['status' => true]);
    }
}
