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
        return view('Messagesuser', ['user' => $user]);
    }
}
