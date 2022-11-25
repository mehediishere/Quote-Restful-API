<p align="center">
  <a href="#" target="_blank">
    <img src="https://github.com/mehediishere/All-Markdown-Files/blob/a72317fad158c9fc456f554377383c4659c1ee29/Images/preview_image.jpg" width="100%" alt="preview">
  </a>
</p>

<div align="center">
<!-- Shield Badge 1st way -->

![version](https://img.shields.io/badge/Laravel-v9.41.0-orange.svg)
![os](https://img.shields.io/badge/PHP-v8.1.6-9cf)
![os](https://img.shields.io/badge/DB-mysql-brightgreen)
![os](https://img.shields.io/badge/Sanctum-v3.0-lightgrey)

</div>

<h1 align="center" style="font-size: 50px;">{{ Quotes }} Restful API</h1>

## Navigation
- [Index](#markdown-navigation)
    - [About](#About)
    - [Database](#Database)
    - [Get Dummy Data](#Get-Dummy-Data)
    - [Resource](#Resource)


## About
> Quotes API
> 1. `Crud` Quotes
> 2. Search
> 3. API Authentication
> 4. Login & Registration through API

## Database
```
laravel
```

## Table
| App\Models | Description            |
|------------|------------------------|
| User       | This for `auth`        |
| Quote      | This for `quotes` data |

## Get Dummy Data
Run
```php
php artisan db:seed
```
Check files
```
database/factories/QuoteFactory.php
```
```
database/seeders/DatabaseSeeder.php
```

## Resource
Following resources are available which you can access via REST API.

`http://127.0.0.1:8000/api/`

| Methods | Routes                         | Description                               | Authentication |
|---------|--------------------------------|-------------------------------------------|----------------|
| get     | /quotes                        | get all quotes                            |                |
| get     | /quotes/1                      | get single quote                          |                |
| get     | /quotes/search/write_something | search by quote (part of quote) or author |                |
| post    | /quotes                        | create a new quote                        | required       |
| put     | /quotes/1                      | update quote (quote id as parameter)      | required       |
| delete  | /quotes/1                      | delete quote (quote id as parameter)      | required       |
| post    | /register                      | new user registration                     |                |
| post    | /login                         | user login to get token for auth          |                |
| get     | /logout                        | delete user token                         | required       |

| Fields                                                | To                      |
|-------------------------------------------------------|-------------------------|
| name<br/>email<br/>password<br/>password_confirmation | Create new user         |
| email<br/>password                                    | User login              |
| quote<br/>author                                      | Create/Update new quote |

### Header
Key: `Accept`, Value: `application/json`
