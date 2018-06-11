<?php

namespace Koetje\FluentModel\Contracts;

interface FluentModelFactoryContract
{
    /**
     * Create a new fluent model instance.
     * 
     * @param  array     $attributes
     * @param  null|bool $useMutators
     * @return FluentModel
     */
    public function make(array $attributes = [], $useMutators = null);

    /**
     * Get the "use mutators" flag on the instance.
     * 
     * @return bool
     */
    public function getUseMutators();

    /**
     * Set the "use mutators" flag on the instance.
     * 
     * @param  bool $value
     * @return $this
     */
    public function setUseMutators($value);
}