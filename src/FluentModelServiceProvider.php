<?php

namespace Koetje\FluentModel;

use Illuminate\Support\ServiceProvider;

class FluentModelServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            'Koetje\FluentModel\Contracts\FluentModelFactoryContract',
            'Koetje\FluentModel\FluentModelFactory'
        );
    }
}