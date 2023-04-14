<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Hash;

class RegisterController extends Controller
{
    public function create(){
        return view('/Signuppage');
    }

    public function store(Request $request){
        $input = $request->all();
        // dd($input);
        User::create([
            'email' => $input['email'],
            'phone' => $input['phone'],
            'name' => $input['name'],
            'password' => Hash::make($input['password']),
            'avatar' => '/images/avatar.png',
        ]);
        
        return redirect()->route('user.page');

    }



}
