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
        if ( strpos( $slug , '-' ) !== false )
        {
            return DB::table( $table )->where( $column , 'LIKE' , $slug . '-' . '%' )->count();
        };
        return DB::table( $table )->where( $column , 'LIKE' , $slug . '%' )->count();
    }

    public function getCountOfExactSlugs( $table , $column , $slug )
    {
        return DB::table( $table )->where( $column , $slug )->count();
    }
}
