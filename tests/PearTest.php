<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use OborotRu\Pear;


class PearTest extends TestCase
{

    /**
     * @test
     */
    public function should_have_correct_weight()
    {
        $pear = new Pear();
        $minWeight = Helper::getHiddenProperty($pear, 'minWeight');
        $maxWeight = Helper::getHiddenProperty($pear, 'maxWeight');
        $weight = $pear->getWeight();

        $this->assertIsInt($weight);
        $this->assertGreaterThanOrEqual($minWeight, $weight);
        $this->assertLessThanOrEqual($maxWeight, $weight);
    }
}
