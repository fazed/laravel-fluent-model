<?php

namespace Fazed\FluentModel;

use Fazed\FluentModel\Contracts\FluentModelFactoryContract;

class FluentModelFactory implements FluentModelFactoryContract
{
    /**
     * {@inheritdoc}
     */
    public function make(array $attributes = [], $useMutators = true)
    {
        return FluentModel::make($attributes, $useMutators);
    }

    /**
     * {@inheritdoc}
     */
    public function makeWithMutators(array $attributes)
    {
        return $this->make($attributes, true);
    }

    /**
     * {@inheritdoc}
     */
    public function makeWithoutMutators(array $attributes)
    {
        return $this->make($attributes, false);
    }
}