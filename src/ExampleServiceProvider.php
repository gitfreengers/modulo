<?php

namespace Freengersdev\firstmodule;

use Illuminate\Support\ServiceProvider;
use Symfony\Component\Finder\Finder;
use Illuminate\Filesystem\Filesystem;

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
        
        $this->loadAutoloader(base_path('vendor'));
    }
    
    /**
     * Require composer's autoload file the packages.
     *
     * @return void
     **/
    protected function loadAutoloader($path)
    {
    	$finder = new Finder;
    	$files = new Filesystem;
    
    	$autoloads = $finder->in($path)->files()->name('autoload.php')->depth('<= 3')->followLinks();
    
    	foreach ($autoloads as $file)
    	{
    		$files->requireOnce($file->getRealPath());
    	}
    }
    
}
