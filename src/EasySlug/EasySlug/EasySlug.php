<?php namespace EasySlug\EasySlug;

use Illuminate\Support\Str;

class EasySlug implements EasySlugInterface
{

    protected $_error_message = "";

    public static function generateSlug($name, $seperator = "-")
    {
        return Str::slug($name, $seperator);
    }

} 