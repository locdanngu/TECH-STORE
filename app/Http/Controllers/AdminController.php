<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAdmin()
    {
        // if (Auth::check() && Auth::user()->role === 'admin') {
        //     $user = Auth::user();
        //     // dd($user);
        //     // Lấy danh sách sản phẩm từ cơ sở dữ liệu
        //     // $products = Product::orderBy('price', 'asc')->get();
        //     // $category = Category::all();
        //     // $notification = Notification::where('id', $user->id)
        //     //                  ->orderBy('idnotification', 'desc')
        //     //                  ->limit(5)
        //     //                  ->get();
        //     // $products = Product::orderBy('price', 'asc')->paginate(6);
        //     // $category = Category::all();
            

        //     // Trả về view "Userpage.blade.php" với dữ liệu sản phẩm và thông tin người dùng
        // return view('Admin', ['user' => $user]);

        // } else {
        //     return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        // }
        return view('Admin');
    }

    public function viewLoginAdmin()
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return view('Admin');
        } else {
            return view('Loginadmin');
        }
    }


    public function loginAdmin(Request $request)
    {
        // Kiểm tra tính hợp lệ của đầu vào
        $this->validate($request, ['email' => 'required|email',
                                'password' => 'required|min:6']);
        
        // Lấy thông tin đăng nhập từ đầu vào
        $credentials = $request->only('email', 'password');
        

        // Thực hiện đăng nhập và kiểm tra tính hợp lệ
        if (Auth::attempt($credentials, $request->remember)) {
            // Nếu đăng nhập thành công, kiểm tra vai trò của người dùng
            $user = Auth::user();
            if ($user->role === 'admin') {
                // Chuyển hướng đến trang người dùng
                // if ($request->remember) {                  
                //     auth()->user()->remember_token = Str::random(60);
                //     auth()->user()->save();
                //     Cookie::queue('remember_token', auth()->user()->remember_token, 1440);
                // }
                return redirect()->route('user.page');
            } else {
                // Nếu vai trò không phải admin, đăng xuất và chuyển hướng đến trang đăng nhập với thông báo lỗi
                Auth::logout();
                return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
            }
        } else {
            // Nếu đăng nhập không thành công, chuyển hướng đến trang đăng nhập và hiển thị thông báo lỗi
            return redirect()->back()->withErrors(['email' => 'Invalid email or password']);
        }
        
        
    }
}
