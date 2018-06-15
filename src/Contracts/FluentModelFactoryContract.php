<?php

namespace Fazed\FluentModel\Contracts;

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
     * Create a new fluent model instance
     * with mutators enabled by default.
     * 
     * @param  array $attributes
     * @return FluentModel
     */
    public function makeWithMutators(array $attributes);

    /**
     * Create a new fluent model instance
     * with mutators disabled by default.
     * 
     * @param  array $attributes
     * @return FluentModel
     */
    public function makeWithoutMutators(array $attributes);
}