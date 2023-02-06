# LAN-Based Library Management System Catalogue

![LAN-Based Library Management System](https://lh3.googleusercontent.com/fife/AMPSemfJTCIXeHwZV-cKK2N0NwfH4SQeJiX09P6oUvc4XIniDWfYxEYghNTok8NylzwLpurf1fuwNGXTUde-iCw4Sdjt5DtDG4FQcoezH4Rd7PNmLefHdegCVbq1zxyalVeCEehBYSOXz-T01Sk5MS2XClvjMxcDgieUKMus3jkSIEExNONgt0MCNPtlRNk8eTRtwHO0kbLfKXGmAG0Bo4B0dPn6ATuMEnpeEljpfGqNuZLNz1WyBC-PGMwjRXkE_6YUmPf5bcdWPBADDwvUNmVwN8GKyI3M8HY8FtH6efvjT3fCF-YFfw8FJXsJCBZKrdGE3j4vfaednrwtshXCXMZk9DoPhaaxKVimnyP37VO9VjeQmVn9ICkDZwQWoJrSTaHvklhg4hr4y6WQl0XHuDBWkVcuMjakw2erwzuFDuxI-XVlb_XuGf99ascJ46JgQnL6CYNSVqRGiMx6lzmgEFO7rOMLu7ay7rOLjMCzWsPhbzhdKcv2CvIoBOQkAwAnD8e6SOtx_egZSfb29mb-S14Ojt8o_szKRv_iSlWLWiBto-iO-DMKbW14fHAOxhOWd4SqsrekuGhuM_4J-CoBOvhPqeGWufdBTa4xfsi_jRafNYTFmVTJdTm_ViI1NPvYXgxulUxF8VsG-lxq-WJQrlDPzb9CjQjw2jRfJWcZiakb68A-od7oPl_RRxcniSi0QloPEm_mCIoyYFAp9lSUZeaJbgLkVqrPcSNfz-RTpNfonaWWcPPOoico-5qq3ch_fBN9mh2QvEU7IQPN9RCtzEUYA7qUgB5G8q5j8qtdYrpLeVR9WkarfUro2NkFQiiz0z7pxoZFH5sVHojCZC--nX2KdK4ZbT_LN2vz6OKEOOULTdOUy7rY3VV1s7Emopkxo1xkbEmxPgPdFEOPF-MSOvk3eSpV2DJtEb5CWHQTQMR76I-wP70NBHA2d1Iz-ZFKTosz5bwVQoN251j0VtSNUJSnddil4rQjHjOlY-4PdsJlyndGMBRTcyeO1PjQj0mvtj6rbbkY5pDM11PgSQNMITrouVekjauYldQcoeA4FCU1pVyi44apWE2k8UP5oizxC0c6pagr1uzwpZ5YXL5timnE6IVtEe2EtTcRB3s33_UBOEGSJ1lXFq7-j5i1rqshYBeuy3W_4-35WczHnLxh6q0epdt0bW5T62xF_MU0ZSB_rZh8rkdIAgO6aqhp4ZSzWUTcxiXJ8jivePw2MPPyiNSR0GHcAasbkq2SldWgukiQY1dFwk8QgWOhF8uJy-5waxFuaNtYmQAisLr-5oj6saCNXHqAefgH2lCG5Uf-RG08seYD-eb2LFLYAxE2t7oUK8js1baEtGYEKH80SXSVIqVRMlm1OnmKBMhoErBVNomziOGNSAcSrd_1gTvaGEVzpHzbMXa9Z_wS09M2pO9ueboX_B9pU9dW3NEvCzc5a4HO6oCgQ3doucsCoXgl25_HZPzlmnvVPlMomxB1KXkOYQYs-u3ENiHqOvRlqT1axj5HloSK2dso3bzcoUqWMJnlGF5noa4O5OdcXKwmN-ug1g8RJSOvmyK0bzikOZMAKmz0C5CRziKgWF6ScG34YKZoFyTJ=w3024-h1732)

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
