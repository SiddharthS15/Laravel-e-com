# InfinityFree / Traditional PHP Hosting Instructions

## Upload Process:
1. Compress your Laravel project into a ZIP file
2. Upload to public_html folder
3. Extract the files
4. Move everything from /public/ to root directory
5. Update index.php paths

## File Structure After Upload:
```
public_html/
├── index.php (from public folder)
├── app/
├── bootstrap/
├── config/
├── database/
├── resources/
├── routes/
├── storage/
├── vendor/
└── .env
```

## Environment Variables (.env):
```
APP_ENV=production
APP_DEBUG=false
APP_KEY=base64:+5tTIbdCqBsi9RRiRvtxQ/wP85N7npgzdM4MGAfzzh0=
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```
