<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Mini Ecommerce Cart')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100 min-h-screen">
    <!-- Navigation -->
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <div class="flex items-center">
                    <a href="{{ route('products.index') }}" class="text-xl font-bold text-gray-800">
                        <i class="fas fa-shopping-store mr-2"></i>Mini Shop
                    </a>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="{{ route('products.index') }}" class="text-gray-600 hover:text-gray-800 transition duration-200">
                        <i class="fas fa-box mr-1"></i>Products
                    </a>
                    <a href="{{ route('cart.show') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition duration-200 flex items-center">
                        <i class="fas fa-shopping-cart mr-2"></i>Cart
                        @if(session('cart') && count(session('cart')) > 0)
                            <span class="ml-1 bg-red-500 text-white rounded-full px-2 py-1 text-xs">
                                {{ array_sum(session('cart', [])) }}
                            </span>
                        @endif
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('success') }}</span>
            </div>
        </div>
    @endif

    @if(session('error'))
        <div class="max-w-7xl mx-auto px-4 py-4">
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                <span class="block sm:inline">{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-12">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <p>&copy; 2025 Mini Ecommerce Cart. Built with Laravel 10+ and Tailwind CSS.</p>
        </div>
    </footer>
</body>
</html>
