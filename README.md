<!-- ABOUT THE PROJECT -->
## About The Project

This is the assessment application which provides the user with a possibility to fetch garage data using API calls.

### Built With
<ul>
<li><a href="https://github.com/slim/Slim">Slim Framework 4</a></li>
<li><a href="https://www.docker.com/">Docker</a></li>
<li><a href="https://github.com/lulco/phoenix">Phoenix migrations</a></li>
<li><a href="https://github.com/tebazil/db-seeder">PHP Db Seeder</a></li>
<li><a href="https://github.com/sebastianbergmann/phpunit">PHPUnit</a></li>
<li><a href="https://github.com/squizlabs/PHP_CodeSniffer">PHP Codesniffer</a></li>
</ul>

<!-- Getting Started -->
## Getting Started
Here you can see how to setup the project. Since the project is using docker you have to have it installed and running. 

Run docker build command:
  ```sh
  make build
  ```

Start application:
  ```sh
  make start
  ```
  
Install all dependencies listed in composer.json file:
  ```sh
  make composer-install
  ```

Initialize migrations:
  ```sh
  make init-migrations
  ```
  
Run migrations:
  ```sh
  make run-migrations
  ```
  
Seed the database with predefined test data:
  ```sh
  make seed
  ```
  
Here you go! The project is functional now and could be accessed using `localhost:8080` host!

## Usage
To fetch data you have to use the next endpoint:

`GET /api/garage`

The expected output is an array of JSON objects containing garage related data:
```
{
    "garages": [
        {
            "garage_id": 2,
            "name": "Garage2",
            "hourly_price": 1.5,
            "currency": "€",
            "contact_email": "testemail@testautopark.fi",
            "point": "60.162562 24.939453",
            "country": "Finland",
            "owner_id": 1,
            "garage_owner": "AutoPark"
        },
        ...
    ]
}
```

There is also a possibility to add a filter to get more specified data. Currently, 4 filters available:

country:

`GET /api/garage?country=Finland`

owner:

`GET /api/garage?owner=Parkkitalo OY`

latitude:

`GET /api/garage?latitude=60.162562`

longitude:

`GET /api/garage?longitude=24.939453`

### Useful commands
- To run phpunit testing: `make phpunit`
- To run phpcs code analysis: `make phpcs`



