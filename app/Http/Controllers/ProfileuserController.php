<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
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

    public function changeProfileuser(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $avatarName = time() . '_' . $avatar->getClientOriginalName();
            $avatar->move(public_path('avatars'), $avatarName);
            $user->avatar = 'avatars/' . $avatarName;
        } else {
            $user->avatar = $user->avatar;
        }
        $user->save();
        return view('Profileuserpage', ['user' => $user]);
    }
}