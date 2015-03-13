<?php namespace EasySlug\EasySlug;

class EasySlugRepository implements EasySlugInterface
{

    public function getCountOfSameSlugs($table, $column, $slug)
    {
        return DB::table($table)->where($column,'=',$slug)->count();
    }

}