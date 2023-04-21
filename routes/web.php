<?php
namespace App\Http\Controllers;

// use App\Http\Middleware\AdminMiddleware;
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

Route::get('/Forgotpage', function () {
    return view('Forgotpage');
})->name('forgot.page');

Route::get('/Profileuserpage', [ProfileuserController::class, 'showProfileuser'])->name('profileuser.page');        //view thông tin user
Route::post('/Profileuserpage', [ProfileuserController::class, 'changeProfileuser'])->name('profileuser.update');   //thay đổi thông tin user
Route::get('/Changepassword', [ProfileuserController::class, 'viewChangePassWord'])->name('changepassword.page');  //view đổi mk
Route::post('/Changepassword', [ProfileuserController::class, 'changePassWord'])->name('changepassword.update');  //route thay mk


Route::get('/Cartuserpage', [CartController::class, 'viewCart'])->name('cart.page');     //view giỏ hàng
Route::post('/Cartuserpage', [CartController::class, 'updateCart'])->name('cart.update');
Route::get('/Cartuserpage/{idproduct}', [CartController::class, 'deleteCart'])->name('cart.delete');
Route::get('/cart/add/{idproduct}', [CartController::class, 'add'])->name('cart.add');     
Route::delete('/Cartuserpage/deleteall', [CartController::class, 'deleteAll'])->name('deleteall');
Route::post('/Cartuserpage/pay', [CartController::class, 'pay'])->name('cart.pay');


Route::get('/Mypurchasepage', [CartController::class, 'viewOrder'])->name('order.page');     //view lịch sử mua hàng


Route::get('/Userpage', [ProductController::class, 'showData'])->name('user.page');             //route chuyển hướng sau khi đăng kí
Route::post('/Userpage/{idcategory}/{idprice}/{search?}', [ProductController::class, 'ajaxRequest'])->name('product.ajaxRequest');  //ajax


Route::post('/login', [LoginController::class, 'login'])->name('login');        //route xử lí đăng nhập
Route::get('/Loginpage', [LoginController::class, 'loginform'])->name('login.page');        //hiển thị form đăng nhập


Route::get('/Signuppage', [RegisterController::class, 'create'])->name('signup.page');          //route view trang đăng kí
Route::post('/register', [RegisterController::class, 'store'])->name('register');               //route xử lí đăng kí


Route::get('/logout', [LogoutController::class, 'logOut'])->name('logout');         //route xử lí đăng xuất





Route::get('/Admin', [AdminController::class, 'viewAdmin'])->middleware('admin')->name('admin.page');             //route chuyển hướng sau khi đăng nhập admin
Route::post('/Loginadmin', [AdminController::class, 'loginAdmin'])->name('admin.login');        //xử lí đăng nhập admin
Route::get('/Loginadmin', [AdminController::class, 'viewLoginAdmin'])->name('admin.loginpage');             //route form đăng nhập admin
Route::get('/logoutadmin', [AdminController::class, 'logOutAdmin'])->name('logout.admin');
