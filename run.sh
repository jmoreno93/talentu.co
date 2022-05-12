cd /var/www/html/
php artisan migrate:fresh --seed
php artisan serve --host=0.0.0.0 --port=3000