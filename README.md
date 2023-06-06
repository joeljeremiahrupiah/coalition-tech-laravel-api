## Setting up the project

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   Make sure you have Composer installed if not you can get it from this link [Composer](https://getcomposer.org/)
-   Run git clone https://github.com/joeljeremiahrupiah/coalition-tech-laravel-api.git and clone it inside the [C:\xampp\htdocs] on windows and [var/www/html] for linux users
-   Run composer install or composer update depending on the status of your composer installation inside the project folder
-   Create a new .env file and copy the contents from .env.example which will be editable later
-   Create a database table which will then be used inside your .env configurations to connect to the database
-   Update your .env file placing the needed database details (depending with your database configurations)
-   Run "php artisan migrate to run your migrations"
-   Start the server by running "php artisan serve"
-   Your local url should be "http://127.0.0.1:8000/" or either if you have set a custom one

After finishing this process you need to reference the vue frontend repository for more steps [Vue](https://github.com/joeljeremiahrupiah/coalition-tech-vue-frontend)
