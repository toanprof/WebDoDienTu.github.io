<?php

namespace App\Http\Controllers;

use App\Models\ChiTietNhapKho;
use App\Models\HoaDonNhapKho;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TestController extends Controller
{
    public function index()
    {

    }

    public function demo()
    {
        return view('client_new.pages.list_order');
    }

    public function postIndex(Request $request)
    {
        $data = 'dasd vr732ruhjk21ry78942598y7.HDQL789258';

        if(strpos($data, "HDQL")) {
            $text = Str::substr($data, strpos($data, "HDQL"));

            dd($text);
        }

    }

    public function viewHome()
    {
        return view('client_new.pages.test');
    }
}
