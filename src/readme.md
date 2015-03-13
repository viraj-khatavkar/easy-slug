# EasySlug (Laravel Package)

## Quick start

Entrust provides a flexible way to add Role-based Permissions to **Laravel**.
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

#### Simple Slug with no validation from database

You can make a simple slug using following code

```php
<?php

EasySlug::getSlug('Your String', '-')
```

The second parameter is the separator for string.
 If no separator is mentioned, it will take "-" as default separator.
