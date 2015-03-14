<?php namespace EasySlug\EasySlug;

use Illuminate\Support\Facades\DB;

class EasySlugRepository implements EasySlugInterface
{

    public function getCountOfMatchingSlugs($table, $column, $slug)
    {
        return DB::table($table)->where($column,'=',$slug)->count();
    }
}