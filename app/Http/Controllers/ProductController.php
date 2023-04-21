<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showData()
    {
        if (Auth::check() && Auth::user()->role === 'customer') {
            $user = Auth::user();
            // dd($user);
            // Lấy danh sách sản phẩm từ cơ sở dữ liệu
            $products = Product::orderBy('price', 'asc')->get();
            $category = Category::all();
            $notification = Notification::where('id', $user->id)
                             ->orderBy('idnotification', 'desc')
                             ->limit(5)
                             ->get();
            // $products = Product::orderBy('price', 'asc')->paginate(6);
            // $category = Category::all();
            

            // Trả về view "Userpage.blade.php" với dữ liệu sản phẩm và thông tin người dùng
        return view('Userpage', ['user' => $user, 'products' => $products, 'category' => $category, 'notification' => $notification]);

        } else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }

    public function ajaxRequest($idcategory,$idprice,$search = null)
    {
        $category = Category::all();
        // if($idcategory >0 && $idprice==0 && $search !=null){          //chọn hãng chưa chọn giá nhưng nhập
        //     $products = Product::where('nameproduct', 'like', '%'.$search.'%')->where('idcategory', $idcategory)->orderBy('price', 'asc')->get();
        // }
        // if($idcategory >0 && $idprice==0 && $search ==null){          //chọn hãng chưa chọn giá nhưng chưa nhập
        //     $products = Product::where('idcategory', $idcategory)->orderBy('price', 'asc')->get();
        // }

        // if($idcategory ==0 && $idprice==0 && $search !=null){   //chưa chọn hãng chưa chọn giá nhưng nhập
        //     // $products = Product::orderBy('price', 'asc')->get();
        //     $products = Product::where('nameproduct', 'like', '%'.$search.'%')->orderBy('price', 'asc')->get();
        // }
        // if($idcategory ==0 && $idprice==0 && $search == null){   //chưa chọn hãng chưa chọn giá chưa nhập
        //     // $products = Product::orderBy('price', 'asc')->get();
        //     $products = Product::orderBy('price', 'asc')->get();
        // }

        // if($idcategory >0 && $idprice>0 && $search !=null){    //chọn hãng và chọn giá
        //     $products = Product::where('nameproduct', 'like', '%'.$search.'%')->where('idcategory', $idcategory)->orderBy('price', 'desc')->get();
        // }
        // if($idcategory >0 && $idprice>0 && $search ==null){
        //     $products = Product::where('idcategory', $idcategory)->orderBy('price', 'desc')->get();
        // }

        // if($idcategory ==0 && $idprice>0 && $search !=null){   //chưa chọn hãng nhưng chọn giá
        //     $products = Product::where('nameproduct', 'like', '%'.$search.'%')->orderBy('price', 'desc')->get();
        // }
        // if($idcategory ==0 && $idprice>0 && $search ==null){   //chưa chọn hãng nhưng chọn giá
        //     $products = Product::orderBy('price', 'desc')->get();
        // }

        if($idcategory==0){
            if($idprice==0){
                if($search ==null){
                    $products = Product::orderBy('price', 'asc')->get();
                }else{
                    $products = Product::where('nameproduct', 'like', '%'.$search.'%')->orderBy('price', 'asc')->get();
                }
            }else{
                if($search ==null){
                    $products = Product::orderBy('price', 'desc')->get();
                }else{
                    $products = Product::where('nameproduct', 'like', '%'.$search.'%')->orderBy('price', 'desc')->get();
                }
            }
        }else{
            if($idprice==0){
                if($search ==null){
                    $products = Product::where('idcategory', $idcategory)->orderBy('price', 'asc')->get();
                }else{
                    $products = Product::where('nameproduct', 'like', '%'.$search.'%')->where('idcategory', $idcategory)->orderBy('price', 'asc')->get();
                }
            }else{
                if($search ==null){
                    $products = Product::where('idcategory', $idcategory)->orderBy('price', 'desc')->get();            
                }else{
                    $products = Product::where('nameproduct', 'like', '%'.$search.'%')->where('idcategory', $idcategory)->orderBy('price', 'desc')->get();
                }
            }
        }

        $html = '';
       
        if(count($products)){               //kiểm tra xem product có chứa gì đó không(vì biến đã đc khởi tạo nên ko dùng isset đc)
            foreach ($products as $product) {
                $html .= '<div class="monhang">';
                $html .= '<a href="#" class="popup-link" data-popup="#popup-' . $product->idproduct . '"><img src="' . $product->image . '" class="imgsp"></a>';
                $html .= '<p class="namesp">' . $product->nameproduct . '</p>';
                $html .= '<p class="namehangsp">' . $product->category->namecategory . '</p>';
                $html .= '<p class="price">$' . $product->price . '</p>';
                $html .= '<a href="' . route('cart.add', ['idproduct' => $product->idproduct]) . '" class="addtocart"><i class="bi bi-plus-circle"></i> Add to cart</a>';
                $html .= '<span class="tonkho">Available:'. $product->inventoryquantity .'</span>';
                $html .= '</div>';
                $html .= '<div id="popup-' . $product->idproduct . '" class="popup">';
                $html .= '<div class="popup-content">';
                $html .= '<a href="' . route('cart.add', ['idproduct' => $product->idproduct]) . '" class="addtocart"><i class="bi bi-plus-circle"></i> Add to cart</a>';
                $html .= '<p class="price">' . $product->nameproduct . '</p>';
                $html .= '<img src="' . $product->image . '" class="imgsp2">';
                $html .= '<p class="review">' . $product->review . '</p>';
                $html .= '<p class="price">$' . $product->price . '</p>';
                $html .= '<span class="tonkho2">Available:'. $product->inventoryquantity .'</span>';
                $html .= '<a href="' . route('cart.add', ['idproduct' => $product->idproduct]) . '" class="addtocart"><i class="bi bi-plus-circle"></i> Add to cart</a>';
                $html .= '</div>';
                $html .= '</div>';
            }
        }else{
            $html .= '<div class="null">';
            $html .= '<p class="nulltxt">No matching products.</p>';
            $html .= '</div>';
        }
        
        return response()->json(['html' => $html]);
    }


}