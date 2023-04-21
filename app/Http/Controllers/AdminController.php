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
}
