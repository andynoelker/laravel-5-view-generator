<?php

namespace Andynoelker\Laravel5ViewGenerator;

use Illuminate\Support\ServiceProvider;

class ViewGeneratorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerViewGenerator();
    }

    /**
     * Register the make:view generator.
     * 
     * @return void
     */
    private function registerViewGenerator()
    {
        $this->app->singleton('command.andynoelker.view', function ($app) {
            return $app['Andynoelker\Laravel5ViewGenerator\ViewMakeCommand'];
        });

        $this->commands('command.andynoelker.view');
    }
}
