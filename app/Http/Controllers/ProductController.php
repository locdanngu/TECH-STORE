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

    public function ajaxRequest($idcategory,$idprice)
    {
        $category = Category::all();

        if($idcategory >0 && $idprice==0){          //chọn hãng chưa chọn giá
            $products = Product::where('idcategory', $idcategory)->orderBy('price', 'asc')->get();
        }
        if($idcategory ==0 && $idprice==0){   //chưa chọn hãng chưa chọn giá
            $products = Product::orderBy('price', 'asc')->get();
            // $products = Product::where('nameproduct', 'like', '%'.$search.'%')->orderBy('price', 'asc')->get();
        }
        if($idcategory >0 && $idprice==1){    //chọn hãng và chọn giá
            $products = Product::where('idcategory', $idcategory)->orderBy('price', 'desc')->get();
        }
        if($idcategory ==0 && $idprice==1){   //chưa chọn hãng nhưng chọn giá
            $products = Product::orderBy('price', 'desc')->get();
        }
        $html = '';
        foreach ($products as $product) {
            $html .= '<div class="monhang">';
            $html .= '<a href=""><img src="' . $product->image . '" class="imgsp"></a>';
            $html .= '<p class="namesp">' . $product->nameproduct . '</p>';
            $html .= '<p class="namehangsp">' . $product->category->namecategory . '</p>';
            $html .= '<p class="price">$' . $product->price . '</p>';
            $html .= '<a href="" class="addtocart"><i class="bi bi-plus-circle"></i> Add to cart</a>';
            $html .= '</div>';
        }
        return response()->json(['html' => $html]);
    }


}