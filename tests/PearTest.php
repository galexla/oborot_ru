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
        $minWeight = Helper::getHiddenProperty('OborotRu\\Pear', 'minWeight', $pear);
        $maxWeight = Helper::getHiddenProperty('OborotRu\\Pear', 'maxWeight', $pear);
        $weight = Helper::getHiddenProperty('OborotRu\\Pear', 'weight', $pear);

        $this->assertIsInt($weight);
        $this->assertGreaterThanOrEqual($minWeight, $weight);
        $this->assertLessThanOrEqual($maxWeight, $weight);
    }
}
