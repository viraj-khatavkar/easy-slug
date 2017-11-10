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
    public function getCountOfMatchingSlugs( $table , $column , $slug, $id)
    {
        $keywords = explode('-', $slug);
        $total_keywords = count($keywords);
        if ( is_numeric($keywords[$total_keywords-1]) )
        {
            return DB::table( $table )->where( $column , 'LIKE' , $slug . '-' . '%' )->where('id','!=',$id)->count();
        }
        return DB::table( $table )->where( $column , 'LIKE' , $slug . '%' )->where('id','!=',$id)->count();
    }

    public function getCountOfExactSlugs( $table , $column , $slug, $id)
    {
        return DB::table( $table )->where( $column , $slug )->where('id','!=',$id)->count();
    }
}
