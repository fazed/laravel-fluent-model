<?php

namespace Koetje\FluentModel;

use Koetje\FluentModel\Contracts\FluentModelFactoryContract;

class FluentModelFactory implements FluentModelFactoryContract
{
    /**
     * Use mutators when create a
     * new fluent model instance.
     * 
     * @var bool
     */
    protected $useMutators = true;

    /**
     * {@inheritdoc}
     */
    public function make(array $attributes = [], $useMutators = null)
    {
        return FluentModel::make($attributes, $useMutators ?? $this->useMutators);
    }
}