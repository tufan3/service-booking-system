1. Clone the repository
git clone https://github.com/tufan3/service-booking-system.git
2. Navigate to the project directory
cd service-booking-system
3. Copy the example environment file
cp .env.example .env
4. Generate the application key
php artisan key:generate
5. Install PHP dependencies
composer install
6. Install Sanctum (if not already required in composer.json)
composer require laravel/sanctum
7. Run database migrations
php artisan migrate
8. Seed database
php artisan db:seed
9. Serve the Laravel application
php artisan serve
