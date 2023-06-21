<br/>

## Table Of Contents

- [About The Project](#about-the-project)
- [API Documentation](#api-documentation)
- [Built With](#built-with)
- [Getting Started](#getting-started)
  - [Prerequisites](#prerequisites)
  - [Installation](#installation)

## About The Project

This is a small application for training on the GraphQL API protocol using laravel.

## API Documentation
<a href="https://documenter.getpostman.com/view/17672386/2s93z584L2#ae127f8b-85c7-402b-a5f0-6c45fff3fdfe" target="_blank"> API Documentation </a>
## Built With

* PHP
* Laravel
* MySql

## Getting Started

To get a local copy up and running follow these simple steps.

### Prerequisites

* install php 8 or above
* install apache2 ( or any local serve )
* install mysql
* install composer

### Installation

1. Clone the repo

```sh
    git clone https://github.com/MUSTAFA-Hamzawy/GraphQL.git
```

2. Make your own copy of the .env file
```sh
    cp .env.example .env
 
    DB_DATABASE= your db name here
    DB_USERNAME= your db username
    DB_PASSWORD= your password 
```
3. Run migrations to create the db

```sh
    php artisan migrate
```
4. Run seeders

```sh
    php artisan db:seed
```

5. Install dependecies

```sh
    composer install
```
6. Generate a key
```sh
    php artisan key:generate
```
7. Start Running
```sh
    php artisan serve
```
