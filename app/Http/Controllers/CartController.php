<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\User;
use App\Models\Notification;
use App\Models\Product;

class CartController extends Controller
{
    
    public function viewCart()
    {
        if (Auth::check() && Auth::user()->role === 'customer') {
            $user = Auth::user();
            $cart_items = Product::join('cart', 'product.idproduct', '=', 'cart.idproduct')
                        ->where('cart.id', $user->id)
                        ->where('status', 0)
                        ->select('product.idproduct', 'product.nameproduct', 'product.price', 'cart.quatifier', 'product.image')
                        ->get();
            return view('Cartpage', ['user' => $user, 'cart_items' => $cart_items]);
        }
         else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }

    public function updateCart(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'customer') {
            $idproduct = $request->input('idproduct');
            $quantity = $request->input('quantity');
            // dd($idproduct,$quantity);
            $user = Auth::user();
            Cart::where('idproduct', $idproduct)->where('id', $user->id)->where('status', 0)->update(['quatifier' => $quantity]);
            return back();
        }
         else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }

    public function deleteCart(Request $request, $idproduct)
    {
        if (Auth::check() && Auth::user()->role === 'customer') {
            // dd($quatifier);
            $user = Auth::user();
            // dd($idproduct);
            Cart::where('idproduct', $idproduct)->where('status', 0)->where('id', $user->id)->delete();
            return back();
        }
         else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }



    public function add($idproduct)
    {
        // Check if user is logged in
        if (Auth::check() && Auth::user()->role === 'customer') {
            $user = Auth::user();

            // Find product with matching id
            $product = Product::findOrFail($idproduct);
            // dd($idproduct);
            // Find or create cart item
            $cartItem = Cart::firstOrNew([
                'idproduct' => $idproduct,
                'id' => $user->id,
                'status' => 0
            ]);
    
            // If the cart item already exists, increment its quantity
            if ($cartItem->exists) {
                // $cartItem->quatifier++;
                return redirect()->back()->withErrors(['fail' => 'Product is already in the cart']);
            } else {
                $cartItem->quatifier = 1;
            }
    
            // Set the value of the idproduct and id fields
            $cartItem->idproduct = $idproduct;
            $cartItem->id = $user->id;
            $cartItem->status = 0;
            // Save the cart item to the database
            $cartItem->save();
            return redirect()->route('cart.page');
            
        }else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }

    public function deleteAll()
    {
        if (Auth::check() && Auth::user()->role === 'customer') {
            // dd($quatifier);
            $user = Auth::user();
            Cart::where('id', $user->id)->where('status', 0)->delete();
            return back();
        }
         else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }

    public function pay(Request $request)
    {
        if (Auth::check() && Auth::user()->role === 'customer') {
            // // dd($quatifier);
            // $user = Auth::user();
            // $totalPrice = $request->input('pay');
            
            // Cart::where('id', $user->id)->where('status', 0)->update(['status' => 1]);
            // $user = User::findOrFail($user->id);
            // $user->balance -= $totalPrice;
            // $user->save();
            // $notification = new Notification;
            // $notification->id = $user->id;
            // $notification->notification = 'Your product is waiting for confirmation';
            // $notification->save();
            $user = Auth::user();
            $totalPrice = $request->input('pay');

            $cartItems = Cart::where('id', $user->id)->where('status', 0)->get();
            // dd($cartItems);
            foreach ($cartItems as $cartItem) {
                $notification = new Notification;
                $notification->id = $user->id;
                $productName = Product::select('nameproduct')->where('idproduct', $cartItem->idproduct)->first()->nameproduct;
                $image = Product::select('image')->where('idproduct', $cartItem->idproduct)->first()->image;
                $notification->notification = 'Your order for product "' . $productName . '" x' . $cartItem->quatifier . ' is waiting for confirmation';
                $notification->image = $image;
                // dd($notification);
                $notification->save();
            }
            Cart::where('id', $user->id)->where('status', 0)->update(['status' => 1]);
            $user = User::findOrFail($user->id);
            $user->balance -= $totalPrice;
            $user->save();
            return redirect()->route('order.page');
        }
         else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }

    public function viewOrder()
    {
        if (Auth::check() && Auth::user()->role === 'customer') {
            $user = Auth::user();
            $cart_items = Product::join('cart', 'product.idproduct', '=', 'cart.idproduct')
                        ->where('cart.id', $user->id)
                        ->where('status', '!=', 0)
                        ->select('product.idproduct', 'product.nameproduct', 'product.price', 'cart.quatifier', 'product.image', 'cart.status')
                        ->get();
            return view('Orderpage', ['user' => $user, 'cart_items' => $cart_items]);
        }
         else {
            return redirect()->route('login.page')->withErrors(['error' => 'You need to log in first!']);
        }
    }


}