<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showData()
    {
        // Lấy danh sách sản phẩm từ cơ sở dữ liệu
        $products = Product::orderBy('price', 'asc')->get();
        $category = Category::all();

        // Trả về view "Userpage.blade.php" với dữ liệu sản phẩm
        return view('Userpage', ['products' => $products, 'category' => $category]);
    }

    public function getCategory(Request $request, $idcategory)
    {
        // // Lấy giá trị của tham số 'idcategory' từ URL
        // $idcategory = $request->input('idcategory');
        // Kiểm tra giá trị của $idcategory
        // dd($idcategory);
        $category = Category::all();
        $products = Product::where('idcategory', $idcategory)->orderBy('price', 'asc')->get();
        return view('Userpage', ['products' => $products, 'category' => $category, 'idcategory' => $idcategory]);
    }


}