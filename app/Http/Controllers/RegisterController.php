<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class RegisterController extends Controller
{
    public function create(){
        if (Auth::check()) {
            return redirect()->route('user.page');
        }else{
            return view('/Signuppage');
        }
    }

    public function store(Request $request){
        $input = $request->all();
        if ($request->password !== $request->password2) {
            return redirect()->back()->withInput()->withErrors(['password' => 'The confirmation password does not match.']);
        }else{
            
            $user = User::create([
                'email' => $input['email'],
                'phone' => $input['phone'],
                'name' => $input['name'],
                'password' => Hash::make($input['password']),
                'avatar' => '/images/avatar.png',
            ]);
    
            // Lưu thông tin người dùng vào session
            // session()->put('user', $user);
    
            // // Đăng nhập người dùng mới đăng ký
            Auth::login($user);
    
            // Chuyển hướng sang trang Userpage, truyền thông tin người dùng qua biến user
            return redirect()->route('user.page');
        }
        
        


    }
    



}