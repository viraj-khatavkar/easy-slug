<?php

use Mockery as m;
use EasySlug\EasySlug\EasySlug;

class EasySlugTest extends PHPUnit_Framework_TestCase
{

    public function setup()
    {
        parent::setUp();

        $this->repo = m::mock('EasySlug\EasySlug\EasySlugRepository');
        $this->easySlug = new EasySlug($this->repo);
    }

    public function test_generate_slug()
    {
        $slug = $this->easySlug->generateSlug('viraj khatavkar');

        $this->assertEquals('viraj-khatavkar', $slug);
    }

    public function test_generate_slug_with_underscore_as_separator()
    {
        $slug = $this->easySlug->generateSlug('viraj khatavkar', '_');

        $this->assertEquals('viraj_khatavkar', $slug);
    }

    public function test_generates_unique_slug()
    {
        $this->repo->shouldReceive('getCountOfMatchingSlugs')->andReturn(1);
        $this->repo->shouldReceive('getCountOfExactSlugs')->andReturn(0);

        $slug = $this->easySlug->generateUniqueSlug('viraj khatavkar', 'demo');

        $this->assertEquals('viraj-khatavkar-2', $slug);
    }

    public function test_generates_unique_slug_for_single_word()
    {
        $this->repo->shouldReceive('getCountOfMatchingSlugs')->andReturn(1);
        $this->repo->shouldReceive('getCountOfExactSlugs')->andReturn(0);

        $slug = $this->easySlug->generateUniqueSlug('mangesh', 'demo');

        $this->assertEquals('mangesh-2', $slug);
    }

    public function tearDown()
    {
        m::close();
    }
}