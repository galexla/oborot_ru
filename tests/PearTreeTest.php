<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use OborotRu\PearTree;


class PearTreeTest extends TestCase
{

    /**
     * @test
     */
    public function should_have_correct_fruits_array_after_construct()
    {
        $tree = new PearTree(0);
        $fruits = Helper::getHiddenProperty('OborotRu\\PearTree', 'fruits', $tree);
        $this->assertIsArray($fruits);
        $this->assertEmpty($fruits);
    }

    /**
     * @test
     */
    public function should_grow_correct_amount_of_fruits()
    {
        $tree = new PearTree(0);
        $tree->grow();
        $minFruits = Helper::getHiddenProperty('OborotRu\\PearTree', 'minFruits', $tree);
        $maxFruits = Helper::getHiddenProperty('OborotRu\\PearTree', 'maxFruits', $tree);
        $fruits = Helper::getHiddenProperty('OborotRu\\PearTree', 'fruits', $tree);
        $nFruits = count($fruits);

        $this->assertGreaterThanOrEqual($minFruits, $nFruits);
        $this->assertLessThanOrEqual($maxFruits, $nFruits);
    }
}
