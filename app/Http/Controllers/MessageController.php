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

    public function messChatuser(Request $request)
    {   
        $user = Auth::user();
        $useradmin = User::where('id', $request['sender_id'])->first();
        $html ='';
        $html .= '<div class="boxmess" style="border: 1px solid white;">
                <div style="padding:1em;display:flex;align-items:center">
                    <img src="' . $useradmin->avatar . '" class="img">
                    <p class="fixtxt" style="color:White;font-weight:bold">' . $useradmin->name . '</p>
                </div>
                <hr class="hr">
                <div class="noidungchat">

                </div>
                <div style="display:flex;justify-content:space-between;padding:1em 1em">
                    <textarea class="textarea"></textarea>
                    <button class="sendbtn">Send</button>
                </div>
            </div>';
        return response()->json(['html' => $html]);
    }
}
