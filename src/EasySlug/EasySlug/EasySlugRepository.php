<?php namespace EasySlug\EasySlug;

use Illuminate\Support\Facades\DB;

class EasySlugRepository
{

    public $easySlug;

    public function __construct( EasySlug $easySlug )
    {
        $this->easySlug = $easySlug;
    }

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
        return DB::table( $table )->where( $column , 'LIKE' , $slug . '-' . '%' )->count();
    }

    public function getCountOfExactSlugs( $table , $column , $slug )
    {
        return DB::table( $table )->where( $column , $slug )->count();
    }
}
