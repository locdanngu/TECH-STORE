<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class RegisterController extends Controller
{
    public function create(){
        if (Auth::check() && Auth::user()->role === 'customer') {
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


            // dd($input);
            // $user = User::create([
            //     'email' => $input['email'],
            //     'phone' => $input['phone'],
            //     'name' => $input['name'],
            //     'verifyemail' => 0,
            //     'password' => Hash::make($input['password']),
            //     'avatar' => '/images/avatar.png',
            //     'role' => 'customer',
            //     'balance' => 0,
            // ]);
    
            
    
            // // // Đăng nhập người dùng mới đăng ký
            // Auth::login($user);
    
            // Chuyển hướng sang trang Userpage, truyền thông tin người dùng qua biến user
            // return redirect()->route('user.page');
            return view('/Codesms', ['input' => $input]);
        }
        
        


    }
    



}