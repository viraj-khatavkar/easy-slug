<?php namespace EasySlug\EasySlug;

use Illuminate\Support\Str;

class EasySlug
{
    protected $_error_message = "";

    private $_easy_slug_repo;

    /**
     * Laravel application
     *
     * @var \Illuminate\Foundation\Application
     */
    public $app;

    public function __construct($app)
    {
        $this->_easy_slug_repo = new EasySlugRepository;
        $this->app = $app;
    }

    /**
     * Creates slug for the provided string
     *
     * If the same slug is present in given table, then numbers are
     * appended at the end
     * E.g. your-slug-1, your-slug-2
     *
     * @param $name
     * @param $table
     * @param $column
     * @param string $seperator
     * @return string
     */
    public function generateSlug($name, $table, $column, $seperator = "-")
    {
        $temporary_slug = $this->getSlug($name, "-");

        $count_of_same_slugs = $this->_easy_slug_repo->getCountOfSameSlugs($table, $column, $temporary_slug);

        if($count_of_same_slugs === 0)
            return $temporary_slug;

        return $this->getSlug($name." ".($count_of_same_slugs+1));
    }

    /**
     * Creates a slug using Laravel's native slug function
     *
     * @param $name
     * @param string $seperator
     * @return string
     */
    public function getSlug($name, $seperator = "-")
    {
        return Str::slug($name, $seperator);
    }

} 