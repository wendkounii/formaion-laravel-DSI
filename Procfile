web: vendor/bin/heroku-php-apache2 public/
release : php artisan migrate:fresh --seed --force && php artisan db:seed --class=RoleSeeder 