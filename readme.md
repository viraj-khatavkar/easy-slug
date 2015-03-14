# EasySlug (Laravel Package)

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/e072de49-18e4-4dba-81c4-02705fe32467/small.png)](https://insight.sensiolabs.com/projects/e072de49-18e4-4dba-81c4-02705fe32467)

## Quick start

EasySlug provides a flexible way to create slugs.
It is compatible with both **Laravel4** as well as **Laravel5**

## Installation

In order to install EasySlug, just add 

    "easy-slug/easy-slug": "2.*"

to your composer.json. Then run `composer install` or `composer update`.

Then in your `config/app.php` add 

    'EasySlug\EasySlug\EasySlugServiceProvider',
    
in the providers array and

    'EasySlug' => 'EasySlug\EasySlug\EasySlugFacade'
    
to the `aliases` array.

## Simple Slug with validation from database

You can make a simple slug with DB validation using following code

```php
<?php

EasySlug::generateUniqueSlug('Your String', 'table name', $column = "slug", $separator = '-')
```

The third parameter is the column name where you will specify the name of column where slug is stored.
The fourth parameter is the separator to be used in creation of the slugs. If not specified, by default it will take "-"
as the default separator

## Simple Slug without database validation

You can also make a simple slug with string as a input

```php
<?php

EasySlug::generateSlug('Your String', $separator = '-')
```

## License

EasySlug is free software distributed under the terms of the MIT license
