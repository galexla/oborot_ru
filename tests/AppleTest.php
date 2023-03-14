<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use OborotRu\Apple;


class AppleTest extends TestCase
{

    /**
     * @test
     */
    public function should_set_weight()
    {
        $apple = new Apple(150);
        $weight = $apple->getWeight();

        $this->assertEquals($weight, $apple->getWeight());
    }

    /**
     * @test
     */
    public function should_generate_correct_weight()
    {
        $apple = new Apple();
        $minWeight = Helper::getHiddenProperty($apple, 'minWeight');
        $maxWeight = Helper::getHiddenProperty($apple, 'maxWeight');
        $weight = $apple->getWeight();

        $this->assertIsInt($weight);
        $this->assertGreaterThanOrEqual($minWeight, $weight);
        $this->assertLessThanOrEqual($maxWeight, $weight);
    }

    /**
     * @test
     */
    public function should_throw_if_incorrect_weight()
    {
        $weight = 150 - 1;
        $this->expectException(\InvalidArgumentException::class);
        $apple = new Apple($weight);

        $weight = 180 + 1;
        $this->expectException(\InvalidArgumentException::class);
        $apple = new Apple($weight);
    }
}
