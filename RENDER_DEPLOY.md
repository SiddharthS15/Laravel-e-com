# Render.com Configuration for Laravel E-commerce App

## Environment Variables (Add in Render Dashboard):
```
APP_NAME=Laravel E-commerce
APP_ENV=production
APP_KEY=base64:+5tTIbdCqBsi9RRiRvtxQ/wP85N7npgzdM4MGAfzzh0=
APP_DEBUG=false
APP_URL=https://your-app-name.onrender.com

LOG_CHANNEL=stderr
LOG_LEVEL=error

DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite

CACHE_DRIVER=file
SESSION_DRIVER=file
SESSION_LIFETIME=120

BROADCAST_DRIVER=log
QUEUE_CONNECTION=sync
```

## Render Service Settings:
- **Name**: laravel-ecommerce (or your choice)
- **Environment**: Web Service
- **Build Command**: `chmod +x render-build.sh && ./render-build.sh`
- **Start Command**: `php artisan serve --host=0.0.0.0 --port=$PORT`
- **Auto-Deploy**: Yes

## Deployment Steps:
1. Go to [render.com](https://render.com)
2. Sign up with GitHub
3. New Web Service → Connect Repository
4. Select: `SiddharthS15/Laravel-e-com`
5. Configure settings above
6. Add environment variables
7. Deploy!

## Expected URL:
https://laravel-ecommerce-[random].onrender.com/products
