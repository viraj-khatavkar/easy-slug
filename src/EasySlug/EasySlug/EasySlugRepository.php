<?php namespace EasySlug\EasySlug;

use Illuminate\Support\Facades\DB;

class EasySlugRepository implements EasySlugInterface
{

    public $easySlug;

    public function __construct(EasySlug $easySlug)
    {
        $this->easySlug = $easySlug;        
    }

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

    public function generateBulkSlugsForTable($table, $primaryKey, $column, $slug_column = 'slug')
    {
        $table_rows = DB::table($table)->get();

        DB::beginTransaction();

            foreach($table_rows as $table_row):

                $slug = $this->easySlug->generateSlug($institute->name, '-');

                $no_of_slugs = DB::table($table)->where($slug_column,'LIKE',$slug.'%')->where($primaryKey, '<', $table_row->institute_id)->count();

                if($no_of_slugs > 0)
                    $slug = $slug.'-'.($no_of_slugs + 1);


                DB::table('institutes')
                    ->where('institute_id', $institute->institute_id)
                    ->update(['slug' => $slug]);

            endforeach;

            DB::commit();
    }

    
}
