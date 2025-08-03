@extends('layouts.app')

@section('title', 'Shopping Cart - Mini Ecommerce Cart')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Shopping Cart</h1>
    <a href="{{ route('products.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
        <i class="fas fa-arrow-left mr-2"></i>Continue Shopping
    </a>
</div>

@if(empty($cartItems))
    <div class="text-center py-12">
        <i class="fas fa-shopping-cart text-6xl text-gray-300 mb-4"></i>
        <h2 class="text-2xl font-semibold text-gray-600 mb-2">Your cart is empty</h2>
        <p class="text-gray-500 mb-6">Add some products to get started!</p>
        <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition duration-200 inline-flex items-center">
            <i class="fas fa-shopping-bag mr-2"></i>Shop Now
        </a>
    </div>
@else
    <div class="bg-white rounded-lg shadow-md overflow-hidden">
        <!-- Cart Items -->
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Product</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Quantity</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Subtotal</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($cartItems as $item)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-24 w-24">
                                        <div class="h-24 w-24 bg-gray-100 rounded-lg flex items-center justify-center overflow-hidden">
                                            @if($item['id'] == 1)
                                                <img src="{{ asset('images/products/laptop.jpg') }}" alt="Laptop" class="h-full w-full object-contain rounded">
                                            @elseif($item['id'] == 2)
                                                <img src="{{ asset('images/products/mouse.jpg') }}" alt="Wireless Mouse" class="h-full w-full object-contain rounded">
                                            @elseif($item['id'] == 3)
                                                <img src="{{ asset('images/products/usb.jpg') }}" alt="USB-C Hub" class="h-full w-full object-contain rounded">
                                            @else
                                                <i class="fas fa-box text-4xl text-gray-400"></i>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-lg font-medium text-gray-900">{{ $item['name'] }}</div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                ${{ number_format($item['price'], 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <form action="{{ route('cart.update') }}" method="POST" class="flex items-center space-x-2">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <select name="quantity" onchange="this.form.submit()" class="border rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                        @for($i = 1; $i <= 20; $i++)
                                            <option value="{{ $i }}" {{ $item['quantity'] == $i ? 'selected' : '' }}>{{ $i }}</option>
                                        @endfor
                                    </select>
                                </form>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                ${{ number_format($item['subtotal'], 2) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                <form action="{{ route('cart.remove') }}" method="POST" class="inline">
                                    @csrf
                                    <input type="hidden" name="product_id" value="{{ $item['id'] }}">
                                    <button type="submit" class="text-red-600 hover:text-red-900 transition duration-200" onclick="return confirm('Are you sure you want to remove this item?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Cart Summary -->
        <div class="bg-gray-50 px-6 py-4">
            <div class="flex justify-between items-center mb-4">
                <span class="text-lg font-semibold text-gray-800">Grand Total:</span>
                <span class="text-2xl font-bold text-blue-600">${{ number_format($grandTotal, 2) }}</span>
            </div>
            
            <div class="flex flex-col sm:flex-row gap-3">
                <form action="{{ route('cart.clear') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-red-500 hover:bg-red-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center" onclick="return confirm('Are you sure you want to clear your cart?')">
                        <i class="fas fa-trash-alt mr-2"></i>Clear Cart
                    </button>
                </form>
                
                <form action="{{ route('cart.checkout') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full bg-green-500 hover:bg-green-600 text-white font-semibold py-3 px-6 rounded-lg transition duration-200 flex items-center justify-center">
                        <i class="fas fa-credit-card mr-2"></i>Checkout
                    </button>
                </form>
            </div>
        </div>
    </div>
@endif
@endsection
