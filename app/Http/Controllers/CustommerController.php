<?php

namespace App\Http\Controllers;

use App\Http\Requests\Client\ClientLoginRequest;
use App\Http\Requests\CustomerChangePassRequest;
use App\Http\Requests\RegisterCustomerRequest;
use App\Jobs\sendMailActiveJob;
use App\Jobs\sendMailResetJob;
use App\Mail\CustomerActiveMail;
use App\Models\Custommer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CustommerController extends Controller
{
    public function viewReset()
    {
        return view('client.page.auth.reset_pass');
    }

    public function viewChangePass($hash)
    {
        $customer = Custommer::where('hash_reset', $hash)->first();
        if($customer) {
            return view('client.page.auth.change_pass', compact('hash'));
        } else {
            toastr()->error('Liên kết không tồn tại!');
            return redirect('/');
        }
    }

    public function actionChangePass(CustomerChangePassRequest $request)
    {
        $customer = Custommer::where('hash_reset', $request->hash)->first();
        $customer->password = bcrypt($request->password);
        $customer->hash_reset = '';
        $customer->save();

        return response()->json([
            'status'    => true,
        ]);
    }

    public function actionReset(Request $request)
    {
        $customer = Custommer::where('email', $request->email)->first();
        if($customer) {
            $hash = Str::uuid();
            $customer->hash_reset = $hash;
            $customer->save();

            // Gửi email
            sendMailResetJob::dispatch($hash, $customer->email, $customer->full_name);
        }

        return response()->json([
            'status'    => true,
        ]);
    }

    public function viewAuth()
    {
        $user = Auth::guard('customer')->check();
        if($user) {
            return redirect('/');
        }
        return view('client.page.auth.index');
    }

    public function register(RegisterCustomerRequest $request)
    {
        $hash = Str::uuid()->toString();
        $data = $request->all();

        $data['hash']       = $hash;
        $data['password']   = bcrypt($request->password);
        $link = env('APP_URL') . '/kich-hoat/' . $hash;

        Custommer::create($data);

        // for($i = 0; $i < 10; $i++) {
        //     // Mail::to($request->email)->send(new CustomerActiveMail($request->full_name, $link));
        //     sendMailActiveJob::dispatch($request->email, $request->full_name, $link);
        // }

        sendMailActiveJob::dispatch($request->email, $request->full_name, $link);

        return response()->json(['status' => true]);
    }

    public function login(ClientLoginRequest $request)
    {
        $data = $request->only('email', 'password');
        $login = Auth::guard('customer')->attempt($data); //trả về true false

        if ($login) {
            //Đã login rồi và có thể xem thông tin các tài khoảng đã login
            $user = Auth::guard('customer')->user(); //Lấy được thông tin tài khoảng đã login => Đã login
            if ($user->is_active == 1) {
                return response()->json([
                    'status' => 1,
                ]);
            } else {
                Auth::guard('customer')->logout(); //Ép logout => Chưa login
                return response()->json([
                    'status' => 2,
                ]);
            }
        } else {
            return response()->json([
                'status' => 0,
            ]);
        }
    }

    public function active($hash)
    {
        $customer = Custommer::where('hash', $hash)->first();
        if ($customer) {
            if ($customer->is_active == 1) {
                toastr()->warning("Tài khoản đã khích hoạt trước đó!");
            } else {
                toastr()->success("Email " . $customer->email . "đã được khích hoạt!");
                $customer->is_active = 1;
                $customer->save();
            }
        } else {
            toastr()->error("Mã kích hoạt không tồn tại");
        }
        return redirect('/');
    }

    public function logout()
    {
        Auth::guard('customer')->logout();
        toastr()->success('Đã đăng xuất thành công!');
        return redirect('/');
    }
}
