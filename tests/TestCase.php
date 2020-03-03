<?php

namespace Fazed\FluentModel\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Fazed\FluentModel\FluentModelServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [FluentModelServiceProvider::class];
    }
}
