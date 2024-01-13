# EasyCash Task

Please find the below descriptions:

## Installation

1- Clone the project\
2- Run composer install\
3- Alter your .env file with your MySQL configuration\
4- Run php artisan migrate\
5- Run php artisan transactions:generate\
6- Run php artisan transactions:index\
7- Run php -S 0.0.0.0:8000 -t public\

## Solution

1- **php artisan transactions:generate** will create 3 large JSON files (with the desired name) each will have **10000 entries** (can be configured from **config/transactions.php**) the files will be placed in **storage/app/***.\
2- **php artisan transactions:index** will read the JSON files (in chunks to save memory for huge files), and save them in DB (I chose this solution to remove the heavy-lifting from the get transaction endpoint - it gets the response in around **17ms**).

## EndPoint Example

**GET** http://localhost:8000/api/v1/transactaions   \
**Filters:** [provider, statusCode, amounteMin, amounteMax, currency]\
**Response is paginated** (**15 per pag**e - can be configured from **config/transactions.php**)

## Digram
https://drive.google.com/file/d/1qfXKdirJYTXkxrkRK7J6NO3V-ZiH5PqW/view?usp=sharing

## Adding A Provider
1- create a **generator class** (which extends the abstract class) to generate the JSON file (override the properties as you need)\
2- create an **indexer class** (which extends the abstract class) to generate the JSON file (override the properties as you need)\
3- add the new provider in **config/providers** \
4- modify the request class' validation for the new values
## Test
To run test cases: run **./vendor/bin/phpunit**

## Containrizaion is available
