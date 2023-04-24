<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\UploadedFile;
use App\Models\Cart;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function viewAdmin()
    {   
        $user = Auth::user();
        return view('Admin', ['user' => $user]);
    }

    public function viewLoginAdmin()
    {
        // return view('Loginadmin');
        if (Auth::check() && Auth::user()->role === 'admin') {
            $user = Auth::user();
            return view('Admin', ['user' => $user]);
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
                return redirect()->route('admin.page');
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


    public function logOutAdmin(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/Loginadmin');
    }




    public function viewCategory()
    {   
        $user = Auth::user();
        $category = Category::orderBy('idcategory', 'asc')->get();
        return view('Category', ['user' => $user, 'category' => $category]);
    }


    public function viewProduct()
    {   
        $user = Auth::user();
        $products = Product::orderBy('idproduct', 'asc')->get();
        $category = Category::orderBy('idcategory', 'asc')->get();
        return view('Product', ['user' => $user, 'products' => $products, 'category' => $category]);
    }

    public function viewOrder()
    {   
        $user = Auth::user();
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 1)->orderBy('updated_at', 'asc')->get();
        return view('Order', ['user' => $user, 'products' => $products, 'cart' => $cart]);
    }

    public function viewHistory()
    {   
        $user = Auth::user();
        $products = Product::orderBy('price', 'asc')->get();
        $cart = Cart::where('status', 2)->orderBy('updated_at', 'asc')->get();
        return view('History', ['user' => $user, 'products' => $products, 'cart' => $cart]);
    }

    public function addCategory(Request $request)
    {   
        $input = $request->all();
        $category = Category::create([
            'namecategory' => $input['namecategory'],
            'iconcategory' => $input['device'],
        ]);
        return back();
    }

    public function updateCategory(Request $request)
    {   
        $input = $request->all();
        // dd($input);
        $category = Category::find($input['idcategory']);
        $category->namecategory = $input['namecategory'];
        $category->iconcategory = $input['device'];
        // dd($category);
        $category->save();
        return back();
    }

    public function deleteCategory(Request $request)
    {   
        $input = $request->all();
        // dd($input);
        $category = Category::find($input['idcategory']);
        $category->delete();
        // dd($category);
        return back();
    }

    public function findCategory(Request $request)
    {   
        $search = $request->input('search');
        // $category = Category::all();
        if(!$search || !is_string($search)){
            // Nếu không có giá trị search hoặc không phải chuỗi thì trả về tất cả bản ghi
            $category = Category::all();
        } else {
            // Nếu có giá trị search và là chuỗi thì truy vấn với điều kiện
            $category = Category::where('namecategory', 'like', '%'.$search.'%')->get();
        }
        // dd($category);
        $html = '';
        foreach($category as $category) {
            $html .= '<tr>';
            $html .= '<td>' . $category->idcategory . '</td>';
            $html .= '<td>' . $category->namecategory . '</td>';
            $html .= '<td><i class="' . $category->iconcategory . '"></i></td>';
            $html .= '<td><button class="buttonfix" data-toggle="modal" data-target="#updateModalcategory" data-category-name="' . $category->namecategory . '" data-category-id="' . $category->idcategory . '"><i class="bi bi-pencil-square"></i> Change</button></td>';
            $html .= '<td><button class="buttonfix" data-toggle="modal" data-target="#deleteModalcategory" data-category-name="' . $category->namecategory . '" data-category-id="' . $category->idcategory . '"><i class="bi bi-trash"></i> Delete</button></td>';
            $html .= '</tr>';
        }
        return response()->json(['html' => $html]);
    }



    public function addProduct(Request $request)
    {
        $product = new Product;

        $product->nameproduct = $request->input('nameproduct');
        $product->price = $request->input('price');
        $product->inventoryquantity = $request->input('quantity');
        $product->idcategory = $request->input('idcategory');
        $product->review = $request->input('review');

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('productimg/');
            $image->move($path, $filename);
            $product->image = '/productimg/' . $filename;
        }

        $product->save();

        return redirect()->back();
    }

}