<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CartController extends Controller
{
    private $products = [
        1 => ['id' => 1, 'name' => 'Laptop', 'price' => 1299.99],
        2 => ['id' => 2, 'name' => 'Wireless Mouse', 'price' => 29.99],
        3 => ['id' => 3, 'name' => 'USB-C Hub', 'price' => 79.99],
    ];

    public function show()
    {
        $cart = session('cart', []);
        $cartItems = [];
        $grandTotal = 0;

        foreach ($cart as $productId => $quantity) {
            if (isset($this->products[$productId])) {
                $product = $this->products[$productId];
                $subtotal = $product['price'] * $quantity;
                $cartItems[] = [
                    'id' => $productId,
                    'name' => $product['name'],
                    'price' => $product['price'],
                    'quantity' => $quantity,
                    'subtotal' => $subtotal
                ];
                $grandTotal += $subtotal;
            }
        }

        return view('cart.show', compact('cartItems', 'grandTotal'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer|in:1,2,3',
            'quantity' => 'integer|min:1'
        ]);

        $productId = $request->product_id;
        $quantity = $request->quantity ?? 1;

        if (!isset($this->products[$productId])) {
            return redirect()->back()->with('error', 'Product not found!');
        }

        $cart = session('cart', []);
        
        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('success', 'Product added to cart!');
    }

    public function update(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer',
            'quantity' => 'required|integer|min:1'
        ]);

        $productId = $request->product_id;
        $quantity = $request->quantity;

        $cart = session('cart', []);

        if (isset($cart[$productId])) {
            $cart[$productId] = $quantity;
            session(['cart' => $cart]);
            return redirect()->back()->with('success', 'Cart updated successfully!');
        }

        return redirect()->back()->with('error', 'Product not found in cart!');
    }

    public function remove(Request $request)
    {
        $request->validate([
            'product_id' => 'required|integer'
        ]);

        $productId = $request->product_id;
        $cart = session('cart', []);

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            session(['cart' => $cart]);
            return redirect()->back()->with('success', 'Product removed from cart!');
        }

        return redirect()->back()->with('error', 'Product not found in cart!');
    }

    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'Cart cleared successfully!');
    }

    public function checkout()
    {
        $cart = session('cart', []);
        
        if (empty($cart)) {
            return redirect()->route('cart.show')->with('error', 'Your cart is empty!');
        }

        // Calculate total for thank you message
        $grandTotal = 0;
        foreach ($cart as $productId => $quantity) {
            if (isset($this->products[$productId])) {
                $grandTotal += $this->products[$productId]['price'] * $quantity;
            }
        }

        // Clear cart after checkout
        session()->forget('cart');
        
        return view('cart.thankyou', compact('grandTotal'));
    }
}
