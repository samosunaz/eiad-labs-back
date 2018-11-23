# Labi: Labs Reservation
 Labs Reservation System Public Webpage, this is the back-end part of the system, to download the front go to https://github.com/samosunaz/eiad-front.git

## Documentation
All the documentation can be found [here](https://docs.google.com/document/d/14R27qIBK8IPwNlxRQFgBW2pLaYtcVrcY88GZDi_fSEc/edit#). 

# Instalation
Note that this project has only been tested using apache, nginx and mysql.

### Requirements
* PHP >= 7.1
* Composer

## Steps
1. Clone the repo, the laravel project is in the directory kanbanboard
```bash
git clone https://github.com/samosunaz/eiad-labs-back.git
```

2. Install dependencies
```bash
composer install
```

3. Copy `env.example` to `.env` and fill in sql and other credentials. 
```bash
cp .env.example .env
```

4. Generate an application key. 
```bash
php artisan key:generate
``` 

5. Migrate the database
```bash
php artisan migrate
```

6. To run locally the project
```bash
php -S localhost:3000
```

A. Optional: Seed the database with example data
```bash
php artisan db:seed
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)
