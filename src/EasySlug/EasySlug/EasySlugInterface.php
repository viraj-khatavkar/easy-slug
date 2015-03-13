<?php namespace EasySlug\EasySlug;

interface EasySlugInterface
{

    public function getCountOfSameSlugs($table, $column, $slug);

} 