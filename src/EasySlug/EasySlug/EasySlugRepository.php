<?php namespace EasySlug\EasySlug;

use Illuminate\Support\Facades\DB;

class EasySlugRepository
{
    /**
     * Returns count of matching slugs
     *
     * @param $table
     * @param $column
     * @param $slug
     *
     * @return mixed
     */
    public function getCountOfMatchingSlugs( $table , $column , $slug )
    {
        $keywords = explode('-', $slug);
        $total_keywords = count($keywords);
        if ( is_numeric($keywords[$total_keywords-1]) )
        {
            return DB::table( $table )->where( $column , 'LIKE' , $slug . '-' . '%' )->count();
        }
        return DB::table( $table )->where( $column , 'LIKE' , $slug . '%' )->count();
    }

    public function getCountOfExactSlugs( $table , $column , $slug )
    {
        return DB::table( $table )->where( $column , $slug )->count();
    }
}
