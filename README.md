
# Backend for Task Management Platform

This project is built using PHP Version `8.0` &
Laravel Version `4.5.1`


## Installation

Install project directly from this git OR run command

```bash
  composer create-project --prefer-dist laravel/laravel simpletaskmanager
```

and then move nessecary files from this repository manually.

Run
```bash
  composer install
```
to install any missing dependencies.

Setup the `.env` file, if does not exist copy it from .env.example and rename it to .env

Run
```bash
  php artisan key:generate
```

Configure database settings in the .env file:
(It should look something like this)
```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=t3hjeff
DB_PASSWORD=1234
```

Create database called `task_manager` in your MySQL.

Run migrations
```bash
  php artisan migrate
```

To run the backend use command
```bash
  php artisan serve
```

We have one testcase which test retrieval of all tasks from db present at `tests/Feature/TasksUnitTest.php`


IMPORTANT!: PLEASE NOTE THAT RUNNING TEST CLEARS THE DATABASE TO PREVENT DATA POLLUTION, IF YOU WANT TO KEEP DATABASE INFORMATION WHILE RUNNING TESTS WHICH IS NOT RECOMMENDED, NAVIGATE TO `tests/Feature/TasksUnitTest.php` AND REMOVE LINE `use RefreshDatabase;`


To run tests simply use command
```bash
  php artisan test
```
