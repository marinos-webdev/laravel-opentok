<?php

namespace m4rinos\laravel-opentok;

use Opentok\Connection;
use Illuminate\Support\ServiceProvider;

class OpentokServiceProvider extends ServiceProvider
{

  /**
   * Perform post-registration booting of services.
   *
   * Adding the config file to the Laravel config directory
   *
   * @return void
   */
	public function boot() {
		$this->publishes([
			__DIR__.'/config/opentok.php' => config_path('opentok.php'),
		]);
	
		$this->app['OpentokApi'] = $this->app->share(function($app) {
			return new OpenTok(
				$app['config']->get('opentok')['api_key'],
				$app['config']->get('opentok')['api_secret']
			);
		});
	}
}
