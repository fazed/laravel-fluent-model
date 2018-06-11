<?php

namespace Fazed\FluentModel\Tests;

use Fazed\FluentModel\FluentModel;

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
}