<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // Kiểm tra tính hợp lệ của đầu vào
        $this->validate($request, ['email' => 'required|email',
                                'password' => 'required|min:6']);

        // Lấy thông tin đăng nhập từ đầu vào
        $credentials = $request->only('email', 'password');

        // // Thực hiện đăng nhập và kiểm tra tính hợp lệ
        // if (Auth::attempt($credentials)) {
        //     // Nếu đăng nhập thành công, chuyển hướng đến trang người dùng
        //     // return redirect()->intended('/Userpage');
        //     return redirect()->route('user.page');

        // } else {
        //     // Nếu đăng nhập không thành công, chuyển hướng đến trang đăng nhập và hiển thị thông báo lỗi
        //     return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
        // }
    }


}
