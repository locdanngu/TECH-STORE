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

Route::get('/Profileuserpage', [ProfileuserController::class, 'showProfileuser'])->middleware('user')->name('profileuser.page');        //view thông tin user
Route::post('/Profileuserpage', [ProfileuserController::class, 'changeProfileuser'])->middleware('user')->name('profileuser.update');   //thay đổi thông tin user
Route::get('/Changepassword', [ProfileuserController::class, 'viewChangePassWord'])->middleware('user')->name('changepassword.page');  //view đổi mk
Route::post('/Changepassword', [ProfileuserController::class, 'changePassWord'])->middleware('user')->name('changepassword.update');  //route thay mk
Route::post('/Verifyemail', [ProfileuserController::class, 'verifyEmail'])->middleware('user')->name('verifyemail.user');
// Route::get('/Verifyemail', [ProfileuserController::class, 'mail'])->middleware('user')->name('mail');

Route::get('/Cartuserpage', [CartController::class, 'viewCart'])->middleware('user')->name('cart.page');     //view giỏ hàng
Route::post('/Cartuserpage', [CartController::class, 'updateCart'])->middleware('user')->name('cart.update');
Route::get('/Cartuserpage/{idproduct}', [CartController::class, 'deleteCart'])->middleware('user')->name('cart.delete');
Route::get('/cart/add/{idproduct}', [CartController::class, 'add'])->middleware('user')->name('cart.add');     
Route::delete('/Cartuserpage/deleteall', [CartController::class, 'deleteAll'])->middleware('user')->name('deleteall');
Route::post('/Cartuserpage/pay', [CartController::class, 'pay'])->middleware('user')->name('cart.pay');


Route::get('/Mypurchasepage', [CartController::class, 'viewOrder'])->middleware('user')->name('order.page');     //view lịch sử mua hàng


Route::get('/Userpage', [ProductController::class, 'showData'])->middleware('user')->name('user.page');             //route chuyển hướng sau khi đăng kí
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
Route::get('/Admin/Category', [AdminController::class, 'viewCategory'])->middleware('admin')->name('admin.category'); 
Route::get('/Admin/Product', [AdminController::class, 'viewProduct'])->middleware('admin')->name('admin.product'); 
Route::get('/Admin/Order', [AdminController::class, 'viewOrder'])->middleware('admin')->name('admin.order'); 
Route::get('/Admin/History', [AdminController::class, 'viewHistory'])->middleware('admin')->name('admin.history'); 
Route::get('/Admin/DenyOrder', [AdminController::class, 'viewDenyorder'])->middleware('admin')->name('admin.denyhistory'); 

Route::post('/Admin/Addcategory', [AdminController::class, 'addCategory'])->middleware('admin')->name('admin.addcategory');  
Route::post('/Admin/Updatecategory', [AdminController::class, 'updateCategory'])->middleware('admin')->name('admin.updatecategory');  
Route::post('/Admin/Deletecategory', [AdminController::class, 'deleteCategory'])->middleware('admin')->name('admin.deletecategory');  
Route::post('/Admin/Findcategory/{search?}', [AdminController::class, 'findCategory'])->middleware('admin')->name('admin.findcategory');  

Route::post('/Admin/Addproduct', [AdminController::class, 'addProduct'])->middleware('admin')->name('admin.addproduct');  
Route::post('/Admin/Updateproduct', [AdminController::class, 'updateProduct'])->middleware('admin')->name('admin.updateproduct');
Route::post('/Admin/Deleteproduct', [AdminController::class, 'deleteProduct'])->middleware('admin')->name('admin.deleteproduct');  
Route::post('/Admin/Findproduct/{search?}', [AdminController::class, 'findProduct'])->middleware('admin')->name('admin.findproduct');  

Route::post('/Admin/Acceptorder', [AdminController::class, 'acceptOrder'])->middleware('admin')->name('admin.acceptorder');
Route::post('/Admin/Denyorder', [AdminController::class, 'denyOrder'])->middleware('admin')->name('admin.denyorder');