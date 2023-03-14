<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use OborotRu\Pear;


class PearTest extends TestCase
{

    /**
     * @test
     */
    public function should_set_correct_weight()
    {
        $pear = new Pear(150);
        $weight = $pear->getWeight();

        $this->assertEquals($weight, $pear->getWeight());
    }

    /**
     * @test
     */
    public function should_generate_correct_weight()
    {
        $pear = new Pear();
        $minWeight = Helper::getHiddenProperty($pear, 'minWeight');
        $maxWeight = Helper::getHiddenProperty($pear, 'maxWeight');
        $weight = $pear->getWeight();

        $this->assertIsInt($weight);
        $this->assertGreaterThanOrEqual($minWeight, $weight);
        $this->assertLessThanOrEqual($maxWeight, $weight);
    }

    /**
     * @test
     */
    public function should_throw_if_incorrect_weight()
    {
        $weight = 130 - 1;
        $this->expectException(\InvalidArgumentException::class);
        $pear = new Pear($weight);

        $weight = 170 + 1;
        $this->expectException(\InvalidArgumentException::class);
        $pear = new Pear($weight);
    }
}
