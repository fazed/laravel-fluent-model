<?php

namespace Koetje\FluentModel\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use Koetje\FluentModel\FluentModelServiceProvider;

abstract class TestCase extends Orchestra
{
    /**
     * {@inheritdoc}
     */
    public function setUp()
    {
        parent::setUp();
    }

    /**
     * {@inheritdoc}
     */
    protected function getEnvironmentSetUp($app)
    {
        //
    }

    /**
     * {@inheritdoc}
     */
    protected function getPackageProviders($app)
    {
        return [FluentModelServiceProvider::class];
    }
}