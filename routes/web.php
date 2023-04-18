<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileuserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Homepage');
})->name('home.page');

// Route::get('/Loginpage', function () {
//     return view('Loginpage');
// })->name('login.page');



// Route::get('/Signuppage', function () {
//     return view('Signuppage');
// })->name('signup.page');

Route::get('/Forgotpage', function () {
    return view('Forgotpage');
})->name('forgot.page');

// Route::get('/Profileuserpage', function () {
//     return view('Profileuserpage');
// })->name('profileuser.page');

Route::get('/Profileuserpage', [ProfileuserController::class, 'showProfileuser'])->name('profileuser.page');        //view thông tin user
Route::post('/Profileuserpage', [ProfileuserController::class, 'changeProfileuser'])->name('profileuser.update');   //thay đổi thông tin user
Route::get('/Changepassword', [ProfileuserController::class, 'viewChangePassWord'])->name('changepassword.page');  //view đổi mk
Route::post('/Changepassword', [ProfileuserController::class, 'changePassWord'])->name('changepassword.update');  //route thay mk
Route::get('/Cartuserpage', [ProfileuserController::class, 'viewCart'])->name('cart.page');     //view giỏ hàng

Route::get('/Mypurchasepage', [ProfileuserController::class, 'viewOrder'])->name('order.page');     //view lịch sử mua hàng




Route::get('/Userpage', [ProductController::class, 'showData'])->name('user.page');             //route chuyển hướng sau khi đăng kí
Route::post('/Userpage/{idcategory}/{idprice}/{search?}', [ProductController::class, 'ajaxRequest'])->name('product.ajaxRequest');  //ajax


Route::post('/login', [LoginController::class, 'login'])->name('login');        //route xử lí đăng nhập
Route::get('/Loginpage', [LoginController::class, 'loginform'])->name('login.page');        //hiển thị form đăng nhập


Route::get('/Signuppage', [RegisterController::class, 'create'])->name('signup.page');          //route view trang đăng kí
Route::post('/register', [RegisterController::class, 'store'])->name('register');               //route xử lí đăng kí


Route::get('/logout', [LogoutController::class, 'logOut'])->name('logout');         //route xử lí đăng xuất







Route::get('/test', function () {
    return view('test');
})->name('test');
