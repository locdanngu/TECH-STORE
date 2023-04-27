<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\UploadedFile;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Carbon;
use App\Models\Cart;
use App\Models\User;
use Hash;
use Mail;
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
            $user->avatar = '/avatars/' . $avatarName;
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


    public function verifyEmail(Request $request)
    {
        $user = Auth::user();
        $useremail = $user->email;
        $name = $user->name;
        $random_number = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $user->codeverifyemail = $random_number;
        $user->codeverifyemailend = Carbon::now()->addMinutes(5);
        $user->save();
        Mail::send('Verifyemail', compact('name','random_number'), function($email) use($request, $name, $random_number){
            $email->subject('Verify you email address', $name,$support,$random_number);
            $email->to($request->email);
        });
        return view('Codeverifyemail', ['useremail' => $useremail, 'user' => $user]);
    }

    public function verifyEmailcode(Request $request)
    {
        $user = Auth::user();
        $useremail = $user->email;
        $endtime = Carbon::now();
        $timecodeend = $user->codeverifyemailend;
        if($user->codeverifyemail == $request->code && $timecodeend > $endtime){
            $user->verifyemail = 1;
            $user->email_verified_at = Carbon::now();
            $user->save();
            return view('Profileuserpage', ['user' => $user]);
        }else{
            return view('Codeverifyemail', ['useremail' => $useremail, 'user' => $user])->withErrors(['error' => 'Code has expired or incorrect!']);
        }
    }
    

    public function findEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if($user->verifyemail == 1){
                $random_number = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
                $user->codechangepass = $random_number;
                $user->timechangepassend = Carbon::now()->addMinutes(5);
                $user->save();
                // dd($user['email']);
                Mail::send('Changepassemail', compact('random_number'), function($email) use($random_number, $request){
                    $email->subject('Change Your Password',$random_number);
                    $email->to($request->email);
                });
                // dd($user);
                return view('Codechangepass', ['useremail' => $user['email']]);
            }else{
                return back()->withErrors(['error' => 'This email account has not been verified!']);
            }
            
        } else {
            return back()->withErrors(['error' => 'This email has not been registered for an account!']);
        }
    }


    public function findEmailchangepassword(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        $endtime = Carbon::now();
        // dd($request->email);
        if ($request->password == $request->password2) {
            if($user->codechangepass == $request->code && $user->timechangepassend > $endtime){
                $user->timechangepass = $endtime;
                $user->password =  Hash::make($request->password);
                $user->save();
                return redirect()->route('login.page')->withErrors(['success' => 'Your need to login again with new password!']);
            }else{
                return back()->withErrors(['error' => 'Code has expired or incorrect!']);
            }
        } else {
            return back()->withErrors(['password' => 'The old password cannot be the same as the new password. Please try again!']);
        }
    }
}