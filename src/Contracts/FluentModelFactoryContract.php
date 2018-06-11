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
}