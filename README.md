# LAN-Based Library Management System Catalogue

# Get Started 
There are two ways of installing the system. Better use with [Docker].

## How to install ?
The following are the steps on how to install the system locally.

Make sure the __Laravel__ was properly installed on your system. [How to install Laravel](https://laravel.com/docs/9.x/installation)

Also don't forget to install __MYSQL__ for the database. [How to install MYSQL](https://dev.mysql.com/downloads/installer/)

Clone the repository
```
git clone https://github.com/Mikee-Angelo/lmsc
```

Switch to the extracted repo folder
```
cd asms-main
```

Install all the dependencies using composer. __Better to install__ [composer](https://getcomposer.org/download/)
```
composer install
```

Copy `.env.example` and rename to `.env` manually or you can use this command.
```
cp .env.example .env
```

After copying fillup the following important parameters found in `.env`
```
DB_HOST=127.0.0.1 or localhost
DB_DATABASE=NAME_OF_YOUR_DATABASE
DB_USERNAME=DB_SERVER_USERNAME
DB_PASSWORD=DB_SERVER_PASSWORD
```

Generate new application key 
```
php artisan key:generate
```

The api can be accessed at http://localhost:8000

#### Good luck, Cheers !!!
