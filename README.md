To fill the database with test data

* php artisan db:seed --class=UserSeeder
* php artisan db:seed --class=BlogCategorySeeder
* php artisan db:seed --class=BlogSeeder

Data Base Settings

* DB_DATABASE=laravel
* DB_USERNAME=root
* DB_PASSWORD=root

Cache

* php artisan cache:clear
* php artisan route:clear
* php artisan view:clear
* php artisan config:clear
