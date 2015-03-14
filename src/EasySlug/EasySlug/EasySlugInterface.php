<?php namespace EasySlug\EasySlug;

interface EasySlugInterface
{

    public function getCountOfMatchingSlugs($table, $column, $slug);

} 