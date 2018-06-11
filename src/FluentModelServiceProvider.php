<?php

namespace Fazed\FluentModel;

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
            'Fazed\FluentModel\Contracts\FluentModelFactoryContract',
            'Fazed\FluentModel\FluentModelFactory'
        );
    }
}