# Mini Ecommerce Cart - Quick Start Guide

## Prerequisites
- PHP 8.1+
- Composer

## Quick Setup
1. `composer install`
2. `cp .env.example .env`  
3. `php artisan key:generate`
4. `php artisan serve`
5. Visit http://localhost:8000

## Features
✅ Product listing (3 hardcoded products)
✅ Add to cart with quantities
✅ Update/remove cart items  
✅ Session-based storage
✅ Checkout with thank you page
✅ Responsive Tailwind design
✅ Flash messages

## Routes
- GET /products (list)
- GET /cart (show cart)
- POST /cart/add
- POST /cart/update  
- POST /cart/remove
- POST /cart/clear
- POST /checkout

Ready for GitHub upload and hosting!
