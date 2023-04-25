<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Cart;
use Hash;
class ProfileuserController extends Controller
{
    public function showProfileuser()
    {
        $user = Auth::user();
        return view('Profileuserpage', ['user' => $user]);  
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


    public function viewChangePassWord()
    {
        $user = Auth::user();
        return view('Changepassword', ['user' => $user]);
    }

    public function changePassWord(Request $request)
    {
        $input = $request->all();
        $user = Auth::user();

        // if ($request->newpassword && !preg_match('/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[a-zA-Z]).{6,18}$/', $request->newpassword)) {
        //     return redirect()->back()->withErrors(['unsuccess' => 'The new password must contain at least one lowercase letter, one uppercase letter, one number, and be between 6 to 18 characters long. Please try again!']);
        // }   Kiểm tra định dạng mật khẩu
        

        if(!Hash::check($request->oldpassword, $user->password)) {
            return redirect()->back()->withErrors(['oldpassword' => 'The old password is incorrect. Please try again!']);
            
        }
        
        if($request->oldpassword == $request->newpassword) {
            return redirect()->back()->withErrors(['oldnewpassword' => 'The old password cannot be the same as the new password. Please try again!']);
        }
        
        if($request->newpassword !== $request->newpassword2){
            return redirect()->back()->withErrors(['newpassword' => 'The new passwords do not match. Please try again!']);
        }
        
        $user->password = Hash::make($request->newpassword);
        $user->save();
        return redirect()->back()->withErrors(['success' => 'Password changed successfully!']);
        
    }


    // public function viewOrder()
    // {
    //     if (Auth::check()) {
    //         $user = Auth::user();
    //     return view('Orderpage', ['user' => $user]);

    //     } else {
    //         return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
    //     }
    // }


    
}