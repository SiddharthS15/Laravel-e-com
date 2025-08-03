<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    private $products = [
        1 => ['id' => 1, 'name' => 'Laptop', 'price' => 1299.99],
        2 => ['id' => 2, 'name' => 'Wireless Mouse', 'price' => 29.99],
        3 => ['id' => 3, 'name' => 'USB-C Hub', 'price' => 79.99],
    ];

    public function index()
    {
        return view('products.index', ['products' => $this->products]);
    }

    public function getProduct($id)
    {
        return $this->products[$id] ?? null;
    }
}
