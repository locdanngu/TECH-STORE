<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Message;
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
        $messages = Message::Where(function ($query) use ($user, $useradmin) {
                                $query->where('sender_id', $user->id)
                                      ->where('receiver_id', $useradmin->id);
                            })
                            ->orWhere(function ($query) use ($user, $useradmin) {
                                $query->where('sender_id', $useradmin->id)
                                      ->where('receiver_id', $user->id);
                            })
                            ->latest('created_at')
                            ->take(20)
                            ->get()
                            ->reverse();
        $html ='';
        $html .= '<div class="boxmess" style="border: 1px solid white;height:92vh">
                <div style="padding:1em;display:flex;align-items:center">
                    <img src="' . $useradmin->avatar . '" class="img">
                    <p class="fixtxt" style="color:White;font-weight:bold">' . $useradmin->name . '</p>
                </div>
                <hr class="hr">
                <div class="noidungchat" style="padding:2em;height:70vh;overflow-x: auto">';
        foreach ($messages as $message) {
            if ($message->sender_id == $user->id) {
                $html .= '<div style="display:flex;justify-content: end;">';
                $html .= '<div style="display:flex;flex-direction:column;margin-right:1em">';
                $html .= '<span style="color:white;border:1px solid white;padding:.5em;border-radius:1em">'.$message->message.'</span>';
                $html .= '<span style="color:white;font-size:10px;align-self: end;">(Send at:'.$message->created_at.')</span>';
                $html .= '</div>';
                $html .= '<img src="' .$user->avatar. '" class="img">';
                $html .= '</div>';
                $html .= '<br>';
            } else {
                $html .= '<div style="display:flex">';
                $html .= '<img src="'. $message->sender->avatar .'" class="img">';
                $html .= '<div style="display:flex;flex-direction:column;margin-left:1em">';
                $html .= '<span style="color:white;border:1px solid white;padding:.5em;border-radius:1em;width: fit-content;">'.$message->message.'</span>';
                $html .= '<span style="color:white;font-size:10px">(Send at:'.$message->created_at.')</span>';
                $html .= '</div>';
                $html .= '</div>';
                $html .= '<br>';
            }
        }
        $html .= '</div>
                        <div style="display:flex;justify-content:space-between;padding:1em 1em">
                            <textarea class="textarea" name="messagecontent"></textarea>
                            <button class="sendbtn" id="buttonsend">Send</button>
                        </div>
                    </div>';

        return response()->json(['html' => $html]);
    }
}