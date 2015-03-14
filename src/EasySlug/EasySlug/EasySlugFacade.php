<?php namespace EasySlug\EasySlug;

use Illuminate\Support\Facades\Facade;

class EasySlugFacade extends Facade {

    protected static function getFacadeAccessor() { return 'easyslug'; }

}
