# Horizon Web Test Assesment
## By Daniel Scicluna
<br/>

### Initiate setup:
- `npm install`
- `composer install`
- Create a new schema DB, and configure DB variables accordingly in .env file.
- `php artisan migrate` - to create all required database.
- `php artisan db:seed` - to get the top 100 ranked movies from external api in DB.
- `npm run build`
- `php artisan serve`