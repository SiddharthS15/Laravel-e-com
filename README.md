# Laravel Mini Ecommerce Cart

A simple Laravel 10+ mini ecommerce cart application using PHP sessions (no database required). Features 3 hardcoded products with full cart functionality.

## Features

- **Product Listing**: Browse 3 hardcoded products (Laptop, Wireless Mouse, USB-C Hub)
- **Add to Cart**: Add products with custom quantities
- **Cart Management**: View, update quantities, and remove items
- **Session-Based**: Uses PHP sessions for cart storage (no database)
- **Checkout**: Fake checkout process with thank you page
- **RESTful Routes**: Clean URL structure
- **Responsive Design**: Tailwind CSS styling with mobile-first approach
- **Flash Messages**: Success/error notifications

## RESTful Routes

- `GET /products` → List all products
- `GET /cart` → Show cart contents
- `POST /cart/add` → Add item to cart
- `POST /cart/update` → Update item quantity
- `POST /cart/remove` → Remove item from cart
- `POST /cart/clear` → Clear entire cart
- `POST /checkout` → Process checkout & show thank you

## Requirements

- PHP 8.1+
- Composer
- Laravel 10+

## Installation & Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/laravel-mini-ecommerce-cart.git
   cd laravel-mini-ecommerce-cart
   ```

2. **Install dependencies**
   ```bash
   composer install
   ```

3. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Add product images (optional)**
   - Place product images in `public/images/products/`
   - Recommended filenames: `laptop.jpg`, `mouse.jpg`, `hub.jpg`

5. **Start the development server**
   ```bash
   php artisan serve
   ```

6. **Access the application**
   - Open your browser and visit: `http://localhost:8000`
   - You'll be redirected to the products page automatically

## Project Structure

```
├── app/Http/Controllers/
│   ├── CartController.php      # Cart operations
│   └── ProductController.php   # Product listing
├── resources/views/
│   ├── layouts/app.blade.php   # Main layout
│   ├── products/index.blade.php # Product listing
│   ├── cart/show.blade.php     # Cart view
│   └── cart/thankyou.blade.php # Checkout success
├── routes/web.php              # Application routes
└── public/images/products/     # Product images
```

## Hardcoded Products

1. **Laptop** - $1,299.99
2. **Wireless Mouse** - $29.99
3. **USB-C Hub** - $79.99

## Cart Features

- Display product name, quantity, price, and subtotal
- Calculate grand total automatically
- Update quantities inline
- Remove individual items
- Clear entire cart
- Persistent across browser sessions (until session expires)

## Technologies Used

- **Backend**: Laravel 10+ (PHP)
- **Frontend**: Blade Templates
- **Styling**: Tailwind CSS
- **Icons**: Font Awesome
- **Storage**: PHP Sessions

## Demo

The application includes:
- Clean, responsive product grid
- Interactive cart with live updates
- Flash messages for user feedback
- Mobile-friendly design
- Professional styling with hover effects

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

## Contributing

Feel free to fork this project and submit pull requests for improvements.

## License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
