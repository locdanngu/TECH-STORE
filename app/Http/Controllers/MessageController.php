<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function viewMessuser()
    {   
        $user = Auth::user();
        $useradmin = User::where('role', 'admin')->select('id', 'name','avatar')->get();
        

        return view('Messagesuser', ['user' => $user, 'useradmin' => $useradmin]);
    }
}
