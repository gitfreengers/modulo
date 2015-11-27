<?php

namespace FreengersDev\Todo;

use Illuminate\Support\ServiceProvider;

class ExampleServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('example', function ($app) {
            return new Example;
        });
    }

    public function boot()
    {
        require __DIR__ . '/Http/routes.php';

        $this->loadViewsFrom(__DIR__ . '/../views', 'example');

        $this->publishes([
            __DIR__ . '/migrations/2015_11_25_154502_create_example_table.php' => base_path('database/migrations/2015_11_25_154502_create_example_table.php'),
            __DIR__ . '/migrations/2015_11_25_155502_add_example_table.php' => base_path('database/migrations/2015_11_25_155502_add_example_table.php'),
        ]);
    }
}
