@echo off
echo ========================================
echo Checking Upload Status
echo ========================================
echo.

echo 1. Checking storage folder...
dir storage\app\public\post-images
echo.

echo 2. Checking public symlink...
dir public\storage
echo.

echo 3. Checking latest post in database...
php artisan tinker --execute="$post = App\Models\Post::latest()->first(); echo 'Title: ' . $post->title . PHP_EOL; echo 'Image: ' . ($post->image ?? 'No image') . PHP_EOL;"
echo.

echo ========================================
echo Done!
echo ========================================
pause
