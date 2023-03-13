<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use OborotRu\Apple;


class AppleTest extends TestCase
{

    /**
     * @test
     */
    public function should_have_correct_weight()
    {
        $apple = new Apple();
        $minWeight = Helper::getHiddenProperty('OborotRu\\Apple', 'minWeight', $apple);
        $maxWeight = Helper::getHiddenProperty('OborotRu\\Apple', 'maxWeight', $apple);
        $weight = Helper::getHiddenProperty('OborotRu\\Apple', 'weight', $apple);

        $this->assertIsInt($weight);
        $this->assertGreaterThanOrEqual($minWeight, $weight);
        $this->assertLessThanOrEqual($maxWeight, $weight);
    }
}
