<?php

namespace Erendi\Fileuploader;

use Erendi\Fileuploader\Facades\Fileuploader;
use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class FileuploaderServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('fileuploader',function(){
            return new Fileuploader();
        });
        $this->app->make('Erendi\Fileuploader\FileuploaderController');
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        require  __DIR__ . '/routes.php';
        $this->loadViewsFrom(__DIR__ . '/Views', 'fileuploader');
        $this->publishes([
            __DIR__ . '/../config/fileuploader.php'  => config_path('fileuploader.php'),
        ], 'config');
        $this->publishes([
            __DIR__ . '/../assets' => public_path('vendor'),
        ], 'public');
        $this->publishes([
            __DIR__ . '/Views'   => resource_path('views/vendor/fileuploader'),
        ], 'view');
    }
}
