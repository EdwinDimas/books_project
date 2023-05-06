<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## My Favorite books API

This repository is the result of a job interview as a software developer. 
The project contains 5 endpoints in total:

# POST /api/login
Requires two formData values: 
    - email : string
    - password : string

This will retrieve a JWT token that needs to be added on every other request header like this:
- Authorization: Bearer {token}

The system needs this to identify the list of books that belongs to your user.

I made two testing users that you can freely use for testing:
edwindimas@example.com
pedroperez@example.com

The password for both is: 123456


# POST /api/logout
Use this to invalidate the current user token.


# GET /api/books
This will retrieve the list of books you like the most in Json format:
```
{
    "books": [
        {
            "id": 4,
            "title": "BOOK TITLE",
            "author": "EDWIN DIMAS",
            "description": "BOOK DESCRIPTION",
            "image_url": null,
            "created_at": "2023-05-06T03:43:17.000000Z",
            "updated_at": "2023-05-06T03:43:17.000000Z",
            "user_id": 1
        },
        {
            "id": 5,
            "title": "BOOK TITLE",
            "author": "EDWIN DIMAS",
            "description": "BOOK DESCRIPTION",
            "image_url": null,
            "created_at": "2023-05-06T03:43:25.000000Z",
            "updated_at": "2023-05-06T03:43:25.000000Z",
            "user_id": 1
        },
        {
            "id": 6,
            "title": "Animi voluptas expedita ut doloremque hic ex.",
            "author": "Oceane Champlin III",
            "description": "Ut eos eum voluptatibus rem nemo accusamus.",
            "image_url": null,
            "created_at": "2023-05-06T04:29:08.000000Z",
            "updated_at": "2023-05-06T04:29:08.000000Z",
            "user_id": 1
        }
    ]
}
```

# POST /api/books
You can add a new book to your list using this endpoint. 
this endpoint will return an error or the latest created book.

Requires 3 values as formdata:
- title : string
- author : string
- description : string

They all allow a maximun of 255 character.


# DELETE /api/books/{id}
This endpoint deletes the book identified by the given id. 

## System Requirements

- PostgreSQL11 Database
- Laravel 10
- PHP 8.2
- Composer

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
