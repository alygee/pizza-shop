<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }

        $cart = $request->session()->get('cart');

        if(!$cart) {
            $cart = [
                    $id => [
                        "name" => $product->name,
                        "description" => $product->description,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->image
                    ]
            ];
        } else if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "name" => $product->name,
                "description" => $product->description,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->image
            ];
        }

        $request->session()->put('cart', $cart);
        return response()->json($cart[$id]);
    }

    public function update(Request $request)
    {
        if($request->id) {
            if ($request->quantity > 0) {
                $cart = $request->session()->get('cart');
                $cart[$request->id]["quantity"] = $request->quantity;
                $request->session()->put('cart', $cart);
                return response()->json($cart[$request->id]);
            } else {
                return $this->remove($request);
            }
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = $request->session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                $request->session()->put('cart', $cart);
            }
            return response()->json(null);
        }
    }

    public function list(Request $request)
    {
        return response()->json($request->session()->get('cart'));
    }
}
