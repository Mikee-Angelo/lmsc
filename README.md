# LAN-Based Library Management System Catalogue

![LAN-Based Library Management System](https://lh3.googleusercontent.com/fife/AMPSemflgYAxI0IgGxtr5tb96m8DKHoMlKw9c-lnaAlnMLXgp3jeswxHdC3bgvq9By8X3EnpZZXWwl9g_n76t027_Oh8cfPxOVMGwDgG4FdVY95jros3aDlf2dQCFqZD_6W4F7irLquNUKxNfdVjDI5qjqItv0KX1WkPVeND86wx_jXRnKs4MP4Kdw6bMfhrmrxa0gwZzbctfq6wxtxMtNSWIFsA5fbHnDvRQfGh46KVF7n5Lrtm7Apz7cEVBhxBJ31eVq-gcZpC__wC8fnoTRTARNnSOxlF4uHohvl_vXB2irxUmM97NlWXtul0ow_oOCIN_9Rcsvfu7b0O09IyLvtu4FJBgsXCP1GifeL1H3R4euOmcq6TMhJupwziAWfXLhmt-RnJ6xgxD1n8RrNRuhLhOz_JToIJBg-L_DtEQOqIIdH-KhzDphIGmqYe608PXRXYY5EsYGju70p2gNPJ5HXuHO2Tz7UkUcYWI7ds0Lmk85U4H-kHeYr029xsYftNfKlajDYIZ0DhTJ8bE_hZzA7unlpmHZ-JAFUa1p2h5JBHUmw7IF-I1ytjuxu15-cnKjO00IgUYpyhPah7bStTxi6cHenqunNP9sfvIeP44kWW8DjW6kG_QdjTUMlU4KS-0N1c-QRoSYP8oNJHxgdCIvMtp0d9MNSE1xjy5eKqdRUsxv5dCySNtW4u9zVxbER48j4iJkXgkMBrArS6WjZTKSlrz3Y16QwvHyeqI-_DgRkol7Y0YJWj7JWBn800J_E4xdCFWkCt4RINNAFJeJwbsxG7o2DBdbDjDkqeNa3W6o03oHQ8_SF9wqVp5MyrlS48RBIp-_n__cYemSz_7dGlhKUPMBu5ASawjahgcbhkU0VNvjuV6gR5bd25sn5DxCxIj6rC5-ffldO-yzJmQ3jfPiRhr_PScfm5a3e7epMaKToAcfuGhSHwYZf9s1E0gnwtzPELDigkeR2reRUJkJPHe01CFdnXiGnMmBRevOits0R7ivaaL1ooB05MvqN9ZXz3o3Qas3zejPJqvcutfvaNAWiwxZI4u0QLbLi11HN30PatiG-uSmXAPgYzgd1QqxBPWmXFM6Q3B75HJbpeYbcqJZKQ2NlkLNTm32RhD64Iu_bG5QsP88WMxuzc4OdW5OaCM9TnjVVs52towzUldH541fMd-C6SPc-6riQ4mXsTuuZ5NG2Aas7ozHvEZv059YUWzQ2gm5PzFiprBl1eS9VzW93oew7S0Xw-nFvliVFuCuSFIsFdiEGq4DFqcz4eAggA7rRrZBf9EOXa54pY46oEQYFal2YFVxlrKql4Z4l59n5ZCeRSj9UqLk4Bmio8NjAtGn-wTIlcBTR5deDws9oOZB0Dk_3go4nR5SZkLijhaUdEJr0_uVKE827B5DeJ_NkpSOgzYy0PrWGgEtUccNiNh80GHie5rdrkOvhwb4JEV1DXqs7yU-rT3puVB07bxdb2GCbaYYnyHtssCD6gwyypLeHypewdhfV-ddbC8r7lzvFEBW3ENFIsUp0aIZhGvPLzW7uX6yEMpAy0-dBG9yfNKVeDuBU9E8CVVhZCPNRJZnzpmJgzwCvhMEc7mLRTwx-zd1me=w3024-h1732)
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
