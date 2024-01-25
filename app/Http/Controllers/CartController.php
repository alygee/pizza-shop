<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request, $id)
    {
        $product = Product::find($id);

        if (!$product) {
            abort(404);
        }

        $cart = $request->session()->get('cart');

        if (!$cart) {
            $cart = [
                $id => [
                    "id" => $product->id,
                    "name" => $product->name,
                    "description" => $product->description,
                    "quantity" => 1,
                    "price" => $product->price,
                    "image" => $product->image
                ]
            ];
        } elseif (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {
            $cart[$id] = [
                "id" => $product->id,
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

    public function delete(Request $request, $productId)
    {
        $product = Product::find($productId);

        if (!$product) {
            abort(404);
        }

        $cart = $request->session()->get('cart');

        if (empty($cart[$productId])) {
            return response('No such item', 418);
        }

        if ($cart[$productId]['quantity'] > 1) {
            $cart[$productId]['quantity']--;
        } else {
            unset($cart[$productId]);
        }

        $request->session()->put('cart', $cart);
        return response('removed', 200);
    }

    public function update(Request $request)
    {
        if ($request->id) {
            if ($request->quantity > 0) {
                $cart = $request->session()->get('cart');
                $cart[$request->id]["quantity"] = intval($request->quantity);
                $request->session()->put('cart', $cart);
                return response()->json($cart[$request->id]);
            } else {
                return $this->remove($request);
            }
        }
    }

    public function currency(Request $request)
    {
        $cart = $request->session()->get('cart');
        if ($request->currency) {
            $cart["currency"] = $request->currency;
            $request->session()->put('cart', $cart);
            return response()->json(['currency' => $cart['currency']]);
        } else {
            if (!isset($cart['currency'])) {
                $cart["currency"] = $request->currency;
                $request->session()->put('cart', $cart);
                return response()->json(['currency' => 'usd']);
            } else {
                return response()->json(['currency' => $cart['currency']]);
            }
        }
    }

    public function remove(Request $request)
    {
        if ($request->id) {
            logger(123);
            $cart = $request->session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                $request->session()->put('cart', $cart);
            }
            return response('removed', 200);
        }
        logger($request->all());
    }

    public function list(Request $request)
    {
        return response()->json($request->session()->get('cart'));
    }
}
