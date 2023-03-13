<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use OborotRu\AppleTree;


class AppleTreeTest extends TestCase
{

    /**
     * @test
     */
    public function should_have_correct_fruits_array_after_construct()
    {
        $tree = new AppleTree(0);
        $fruits = Helper::getHiddenProperty('OborotRu\\AppleTree', 'fruits', $tree);
        $this->assertIsArray($fruits);
        $this->assertEmpty($fruits);
    }

    /**
     * @test
     */
    public function should_grow_correct_amount_of_fruits()
    {
        $tree = new AppleTree(0);
        $tree->grow();
        $minFruits = Helper::getHiddenProperty('OborotRu\\AppleTree', 'minFruits', $tree);
        $maxFruits = Helper::getHiddenProperty('OborotRu\\AppleTree', 'maxFruits', $tree);
        $fruits = Helper::getHiddenProperty('OborotRu\\AppleTree', 'fruits', $tree);
        $nFruits = count($fruits);

        $this->assertGreaterThanOrEqual($minFruits, $nFruits);
        $this->assertLessThanOrEqual($maxFruits, $nFruits);
    }
}
