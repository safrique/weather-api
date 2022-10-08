<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://www.myclientshare.com/hubfs/CS-Logo-FULL_Green.svg" width="400"></a></p>

# Weather API
## Clientshare take-hope coding task
### _Josef van Niekerk_

### Instructions

1. Fork the repository from https://github.com/safrique/weather-api.
2. Contact me to get a copy of the .env file.
3. Create a database on your local MySQL database setup and call it weather-api
4. Create a user on this new database named root, and make the password the same as on the .env file. Alternativey 
   uou can use a user you've already set up on your local database, but remember to change the DB_USERNAME & 
   DB_PASSWORD on the .env file.
5. From inside the new repo folder, run the following commands to set up the projects dependencies, set up the caching 
   properly and run 
   migrations and 
   seeders. An entry for London GB will be seeded into the database cities table.


    composer install
    php artisan config:clear 
    php artisan clear-compiled 
    php artisan optimize 
    php artisan config:cache 
    php artisan route:cache
    php artisan migrate --seed
6. Start the inbuilt Laravel web server by running:


    php artisan serve
7. In a browser window, go to http://127.0.0.1:8000/ or http://localhost:8000/ to go to the welcome page.
8. Use the menu at the top of the page to navigate around the site.
9. Use the buttons on the pages
