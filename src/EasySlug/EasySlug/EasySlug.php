<?php namespace EasySlug\EasySlug;

class EasySlug
{
    /**
     * @var EasySlugRepository
     */
    private $_easy_slug_repo;

    public function __construct( EasySlugRepository $easy_slug )
    {
        $this->_easy_slug_repo = $easy_slug;
    }

    /**
     * Creates slug for the provided string.
     *
     * If the same slug is present in given table, then numbers are
     * appended at the end
     * E.g. your-slug-1, your-slug-2
     *
     * @param        $string
     * @param        $table
     * @param        $column
     * @param string $separator
     *
     * @return string
     */
    public function generateUniqueSlug( $string , $table , $column = "slug" , $separator = "-" )
    {
        $temporary_slug = $this->generateSlug( $string , "-" );

        $count_of_matching_slugs = $this->_easy_slug_repo
            ->getCountOfMatchingSlugs( $table , $column ,
                                       $temporary_slug );

        if ( $count_of_matching_slugs > 0 )
        {
            $temporary_slug = $this->generateSlug( $string . " " . ( $count_of_matching_slugs + 1 ) , $separator );

            $flag = false;

            $i = 2;
            while($flag == false)
            {
                $exact_slugs = $this->_easy_slug_repo->getCountOfExactSlugs($table, $column, $temporary_slug);

                if($exact_slugs > 0)
                {
                    $temporary_slug = $this->generateSlug( $string . " " . ( $count_of_matching_slugs + $i ) , $separator );
                    $i++;
                }
                else
                {
                    $flag = true;
                }
            }
        }
        else {
            $temporary_slug = $temporary_slug . '-1';
        }

        return $temporary_slug;
    }

    /**
     * @param        $string
     * @param string $separator
     *
     * @return string
     */
    public function generateSlug( $string , $separator = "-" )
    {
        return trim( preg_replace( '/[^a-z0-9]+/' , $separator , strtolower( strip_tags( $string ) ) ) , $separator );
    }

}
