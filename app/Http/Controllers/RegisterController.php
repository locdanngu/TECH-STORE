<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Twilio\Rest\Client;
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
        $user = User::where('email', $input['email'])->first();
        if ($request->password !== $request->password2) {
            return redirect()->back()->withInput()->withErrors(['password' => 'The confirmation password does not match.']);
        }else if($user){
            return redirect()->back()->withInput()->withErrors(['email' => 'This email address is already registered.']);
        }else{
            // $sid = env('TWILIO_ACCOUNT_SID');
            // $token = env('TWILIO_AUTH_TOKEN');
            // $random_number = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            // // Create a new Twilio Rest Client instance
            // $client = new Client($sid, $token);
            
            // // Send an SMS message
            // $message = $client->messages->create(
            //     '+84977481545', // Số điện thoại tạm thời của Twilio
            //     array(
            //         'from' => env('TWILIO_PHONE_NUMBER'), // Your Twilio phone number
            //         // 'body' => $request->input('Your OTP code for account registration is:' + $random_number) // The message content
            //         'body' => 'Your OTP code for account registration is: ' . $random_number
            //     )
            // );

            // dd($input);
            $user = User::create([
                'email' => $input['email'],
                'phone' => $input['phone'],
                'name' => $input['name'],
                'verifyemail' => 0,
                'password' => Hash::make($input['password']),
                'avatar' => '/images/avatar.png',
                'role' => 'customer',
                'balance' => 0,
                'status' => 0,
            ]);
            // // Đăng nhập người dùng mới đăng ký
            Auth::login($user);
            // Chuyển hướng sang trang Userpage, truyền thông tin người dùng qua biến user
            return redirect()->route('user.page');
            // return view('/Codesms', ['input' => $input, 'random_number' => $random_number]);
        }
        
        


    }
    



}