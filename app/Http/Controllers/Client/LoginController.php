<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin() {
        return view('client.login');
    }

    public function login(Request $request)
    {
        $result = Auth::attempt(['email' => $request->email, 'password' => $request->password], true);
        if ($result) {
            if (Auth::user()->status == 0) {
                toastr()->error('Tài khoản của bạn đang chờ duyệt');
                Auth::logout();

                return redirect()->back()->withInput();
            }

            if (Auth::user()->active == 0) {
                toastr()->error('Tài khoản của bạn đã bị khóa, vui lòng liên hệ quản trị viên');
                Auth::logout();

                return redirect()->back()->withInput();
            }

            toastr()->success('Đăng nhập thành công');

            return redirect()->route('client.home');
        } else {
            toastr()->error('Email / Mật khẩu không đúng, vui lòng thử lại');

            return redirect()->back()->withInput();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('client.show.login');
    }
}
