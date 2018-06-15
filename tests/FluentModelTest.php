<?php

namespace Fazed\FluentModel\Tests;

use Fazed\FluentModel\FluentModel;
use Fazed\FluentModel\Tests\Examples\WithMutators;

class FluentModelTest extends TestCase
{
    /** @test */
    public function it_can_create_instance_wo_data()
    {
        $model = FluentModel::make();

        $this->assertEmpty($model->getAttributes());
    }

    /** @test */
    public function it_can_create_instance_w_data()
    {
        $model = FluentModel::make(['some' => 'data']);

        $this->assertSame('data', $model->some);
    }

    /** @test */
    public function it_can_create_instance_w_mutators()
    {
        $model = WithMutators::makeWithMutators(['some' => 'data']);

        $this->assertSame('_data', $model->some);
    }

    /** @test */
    public function it_can_create_instance_wo_mutators()
    {
        $model = WithMutators::makeWithoutMutators(['some' => 'data']);

        $this->assertSame('data', $model->some);
    }
}