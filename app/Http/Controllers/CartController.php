<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    
    public function viewCart()
    {
        if (Auth::check()) {
            $user = Auth::user();
            $cart_items = Product::join('cart', 'product.idproduct', '=', 'cart.idproduct')
                        ->where('cart.id', $user->id)
                        ->select('product.idproduct', 'product.nameproduct', 'product.price', 'cart.quatifier', 'product.image')
                        ->get();
            return view('Cartpage', ['user' => $user, 'cart_items' => $cart_items]);
        }
         else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }

    public function updateCart(Request $request, $idproduct, $quatifier)
    {
        if (Auth::check()) {
            // dd($quatifier);
            $user = Auth::user();
            Cart::where('idproduct', $idproduct)->where('id', $user->id)->update(['quatifier' => $quatifier]);
            return back();
        }
         else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }

    public function deleteCart(Request $request, $idproduct)
    {
        if (Auth::check()) {
            // dd($quatifier);
            $user = Auth::user();
            // dd($idproduct);
            Cart::where('idproduct', $idproduct)->where('id', $user->id)->delete();
            return back();
        }
         else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }



    public function add($idproduct)
    {
        // Check if user is logged in
        if (Auth::check()) {
            $user = Auth::user();

            // Find product with matching id
            $product = Product::findOrFail($idproduct);
            // dd($idproduct);
            // Find or create cart item
            $cartItem = Cart::firstOrNew([
                'idproduct' => $idproduct,
                'id' => $user->id
            ]);
    
            // If the cart item already exists, increment its quantity
            if ($cartItem->exists) {
                // $cartItem->quatifier++;
                return back();
            } else {
                $cartItem->quatifier = 1;
            }
    
            // Set the value of the idproduct and id fields
            $cartItem->idproduct = $idproduct;
            $cartItem->id = $user->id;
    
            // Save the cart item to the database
            $cartItem->save();
            return redirect()->route('cart.page');
            
        }else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }



}