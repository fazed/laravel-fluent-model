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
}