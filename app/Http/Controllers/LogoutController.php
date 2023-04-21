<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LogoutController extends Controller
{
    // public function logOut()
    // {
    //     $user = Auth::user();
    //     Auth::logout();
    //     return redirect()->route('login.page');
        
    // }
    public function logOut(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/Loginpage');
    }

}
