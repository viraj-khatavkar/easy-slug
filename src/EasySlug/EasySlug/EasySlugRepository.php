<?php namespace EasySlug\EasySlug;

use Illuminate\Support\Facades\DB;

class EasySlugRepository implements EasySlugInterface
{

    /**
     * Returns count of matching slugs
     *
     * @param $table
     * @param $column
     * @param $slug
     * @return mixed
     */
    public function getCountOfMatchingSlugs($table, $column, $slug)
    {
        return DB::table($table)->where($column,'LIKE',$slug.'%')->count();
    }
}
