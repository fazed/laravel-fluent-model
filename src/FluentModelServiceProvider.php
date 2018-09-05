<?php

namespace Fazed\FluentModel;

use Illuminate\Support\ServiceProvider;

class FluentModelServiceProvider extends ServiceProvider
{
    /**
     * {@inheritdoc}
     */
    protected $defer = true;

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

    /**
     * {@inheritdoc}
     */
    public function provides()
    {
        return [
            'Fazed\FluentModel\Contracts\FluentModelFactoryContract',
        ];
    }
}