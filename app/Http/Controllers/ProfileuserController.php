<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileuserController extends Controller
{
    public function showProfileuser()
    {
        if (Auth::check()) {
            $user = Auth::user();
        return view('Profileuserpage', ['user' => $user]);

        } else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }
}
