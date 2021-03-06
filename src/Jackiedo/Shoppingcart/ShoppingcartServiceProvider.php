<?php namespace Jackiedo\Shoppingcart;

use Illuminate\Support\ServiceProvider;

class ShoppingcartServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('jackiedo/shoppingcart');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['cart'] = $this->app->share(function($app) {
			return new Cart($app['session'], $app['events']);
		});

        // $this->app->singleton('cart', function($app) {
        //     return new Cart($app['session'], $app['events']);
        // });
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
