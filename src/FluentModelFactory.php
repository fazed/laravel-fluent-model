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

    /**
     * {@inheritdoc}
     */
    public function getUseMutators()
    {
        return $this->useMutators;
    }

    /**
     * {@inheritdoc}
     */
    public function setUseMutators($value)
    {
        $this->useMutators = $value;

        return $this;
    }
}