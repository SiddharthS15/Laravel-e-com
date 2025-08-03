@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="flex justify-between items-center mb-8">
    <h1 class="text-3xl font-bold text-gray-800">Our Products</h1>
</div>
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
    @foreach($products as $product)
        <div class="bg-white rounded-lg shadow-md hover:shadow-lg transition duration-300 max-w-sm mx-auto h-full flex flex-col">
            <div class="flex items-center justify-center h-48 w-full bg-gray-50 rounded-t-lg overflow-hidden">
                @if($product['id'] == 1)
                    <img src="{{ asset('images/products/laptop.jpg') }}" alt="Laptop" class="h-full w-full object-contain p-2">
                @elseif($product['id'] == 2)
                    <img src="{{ asset('images/products/mouse.jpg') }}" alt="Wireless Mouse" class="h-full w-full object-contain p-2">
                @elseif($product['id'] == 3)
                    <img src="{{ asset('images/products/usb.jpg') }}" alt="USB-C Hub" class="h-full w-full object-contain p-2">
                @else
                    <i class="fas fa-box text-6xl text-gray-400"></i>
                @endif
            </div>
            <div class="p-6 flex-1 flex flex-col justify-between">
                <div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">{{ $product['name'] }}</h3>
                    <p class="text-2xl font-bold text-blue-600 mb-4">${{ number_format($product['price'], 2) }}</p>
                </div>
                <form action="{{ route('cart.add') }}" method="POST" class="space-y-3">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                    <div class="flex items-center space-x-2">
                        <label for="quantity_{{ $product['id'] }}" class="text-sm font-medium text-gray-700">Qty:</label>
                        <select name="quantity" id="quantity_{{ $product['id'] }}" class="border rounded px-2 py-1 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                            @for($i = 1; $i <= 10; $i++)
                                <option value="{{ $i }}">{{ $i }}</option>
                            @endfor
                        </select>
                    </div>
                    <button type="submit" class="w-full bg-blue-500 hover:bg-blue-600 text-white font-semibold py-2 px-4 rounded-lg transition duration-200 flex items-center justify-center">
                        <i class="fas fa-cart-plus mr-2"></i>Add to Cart
                    </button>
                </form>
            </div>
        </div>
    @endforeach
</div>
@endsection
