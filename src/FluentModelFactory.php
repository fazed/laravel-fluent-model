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
     * Get the "use mutators" flag on the instance.
     * 
     * @return bool
     */
    public function getUseMutators()
    {
        return $this->useMutators;
    }

    /**
     * Set the "use mutators" flag on the instance.
     * 
     * @param  bool $value
     * @return $this
     */
    public function setUseMutators($value)
    {
        $this->useMutators = $value;

        return $this;
    }
}