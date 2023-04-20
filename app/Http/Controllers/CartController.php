<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    /**
     * Add product to cart.
     *
     * @param  int  $idproduct
     * @return \Illuminate\Http\Response
     */
    public function add($idproduct)
{
    // Check if user is logged in
    if (!Auth::check()) {
        return redirect()->route('login')->withErrors(['error' => 'You need to log in first!']);
    }

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
        $cartItem->quatifier++;
    } else {
        $cartItem->quatifier = 1;
    }

    // Set the value of the idproduct and id fields
    $cartItem->idproduct = $idproduct;
    $cartItem->id = $user->id;

    // Save the cart item to the database
    $cartItem->save();


    return back();
}



}