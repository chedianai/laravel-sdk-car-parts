<?php
/**
 * Created by PhpStorm.
 * User: keal
 * Date: 2018/2/28
 * Time: 下午11:49
 */
namespace Chedianai\LaravelCarParts;

use CarParts\Application;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Foundation\Application as LaravelApplication;
use Laravel\Lumen\Application as LumenApplication;

class ServiceProvider extends LaravelServiceProvider
{
    /**
     * Boot the provider.
     */
    public function boot()
    {
    }

    /**
     * Setup the config.
     */
    protected function setupConfig()
    {
        $source = realpath(__DIR__.'/config.php');
        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$source => config_path('carparts.php')], 'laravel-carparts');
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('carparts');
        }
        $this->mergeConfigFrom($source, 'carparts');
    }

    public function register()
    {
        $this->setupConfig();

        $this->app->singleton('chedianai.carparts', function ($laravelApp) {
            $app = new Application(config('carparts.default'));

            if (config('carparts.use_laravel_cache')) {
                $app['cache'] = new CacheBridge($laravelApp['cache.store']);
            }

            return $app;
        });
    }
}