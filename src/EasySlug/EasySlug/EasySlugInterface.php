<?php namespace EasySlug\EasySlug;

interface EasySlugInterface
{

    public function getCountOfMatchingSlugs($table, $column, $slug);

    public function generateBulkSlugsForTable($table, $primaryKey, $column, $slug_column = 'slug');

}
