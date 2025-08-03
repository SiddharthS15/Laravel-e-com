@extends('layouts.app')

@section('title', 'Thank You - Mini Ecommerce Cart')

@section('content')
<div class="text-center py-12">
    <div class="mb-8">
        <i class="fas fa-check-circle text-6xl text-green-500 mb-4"></i>
        <h1 class="text-4xl font-bold text-gray-800 mb-4">Thank You for Your Order!</h1>
        <p class="text-xl text-gray-600 mb-6">Your order has been successfully placed.</p>
    </div>

    <div class="bg-white rounded-lg shadow-md p-8 max-w-md mx-auto mb-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Order Summary</h2>
        <div class="border-t border-gray-200 pt-4">
            <div class="flex justify-between items-center">
                <span class="text-lg font-medium text-gray-700">Total Amount:</span>
                <span class="text-2xl font-bold text-green-600">${{ number_format($grandTotal, 2) }}</span>
            </div>
        </div>
        <p class="text-sm text-gray-500 mt-4">
            <i class="fas fa-info-circle mr-1"></i>
            This is a demo checkout. No actual payment was processed.
        </p>
    </div>

    <div class="space-y-4 sm:space-y-0 sm:space-x-4 sm:flex sm:justify-center">
        <a href="{{ route('products.index') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-3 rounded-lg transition duration-200 inline-flex items-center">
            <i class="fas fa-shopping-bag mr-2"></i>Continue Shopping
        </a>
        <a href="{{ route('cart.show') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-3 rounded-lg transition duration-200 inline-flex items-center">
            <i class="fas fa-shopping-cart mr-2"></i>View Cart
        </a>
    </div>
</div>
@endsection
