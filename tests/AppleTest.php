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
        $minWeight = Helper::getHiddenProperty($apple, 'minWeight');
        $maxWeight = Helper::getHiddenProperty($apple, 'maxWeight');
        $weight = $apple->getWeight();

        $this->assertIsInt($weight);
        $this->assertGreaterThanOrEqual($minWeight, $weight);
        $this->assertLessThanOrEqual($maxWeight, $weight);
    }
}
