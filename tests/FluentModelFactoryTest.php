<?php

namespace Fazed\FluentModel\Tests;

use Fazed\FluentModel\Contracts\FluentModelFactoryContract;

class FluentModelFactoryTest extends TestCase
{
    /** @test */
    public function it_can_create_instance_wo_data()
    {
        $model = app(FluentModelFactoryContract::class)->make();

        $this->assertEmpty($model->getAttributes());
    }

    /** @test */
    public function it_can_create_instance_w_data()
    {
        $model = app(FluentModelFactoryContract::class)->make([
            'some' => 'data'
        ]);

        $this->assertSame('data', $model->some);
    }
}