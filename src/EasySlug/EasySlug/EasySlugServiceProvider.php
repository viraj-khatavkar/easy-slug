<?php namespace EasySlug\EasySlug;

use Illuminate\Support\ServiceProvider;

class EasySlugServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app->bind('easyslug', function($app)
		{
			return new EasySlug(new \EasySlug\EasySlug\EasySlugRepository);
		});
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}
