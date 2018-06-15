<?php

namespace Fazed\FluentModel\Tests\Examples;

use Fazed\FluentModel\FluentModel;

class WithMutators extends FluentModel
{
    /**
     * Set mutator for "some"-attribute.
     *
     * @param  mixed $value
     * @return $this
     */
    public function setSomeAttribute($value)
    {
        $this->attributes['some'] = '_' . $value;

        return $this;
    }
}
