<?php

namespace Tests;

use OborotRu\Trees\AppleTree;
use PHPUnit\Framework\TestCase;


class AppleTreeTest extends TestCase
{

    /**
     * @test
     */
    public function should_get_reg_number()
    {
        $regNumber = 12;
        $tree = new AppleTree($regNumber);
        $this->assertEquals($regNumber, $tree->getRegNumber());
    }

    /**
     * @test
     */
    public function should_get_min_max_fruits()
    {
        $tree = new AppleTree(0);
        $minFruits = Helper::getHiddenProperty($tree, 'minFruits');
        $maxFruits = Helper::getHiddenProperty($tree, 'maxFruits');
        $this->assertEquals($minFruits, $tree->getMinFruits());
        $this->assertEquals($maxFruits, $tree->getMaxFruits());
    }

    /**
     * @test
     */
    public function should_init_fruits_array()
    {
        $tree = new AppleTree(0);
        $fruits = Helper::getHiddenProperty($tree, 'fruits');

        $this->assertIsArray($fruits);
        $this->assertEmpty($fruits);
    }

    /**
     * @test
     */
    public function should_throw_if_incorrect_n_fruits()
    {
        $tree = new AppleTree(0);
        $nFruits = $tree->getMinFruits() - 1;
        $this->expectException(\InvalidArgumentException::class);
        $tree->grow($nFruits);

        $nFruits = $tree->getMaxFruits() + 1;
        $tree = new AppleTree(0);
        $this->expectException(\InvalidArgumentException::class);
        $tree->grow($nFruits);
    }

    /**
     * @test
     */
    public function should_grow_correct_amount_of_fruits()
    {
        $tree = new AppleTree(0);
        $nFruits = $tree->getMinFruits();
        $tree->grow($nFruits);
        $fruits = Helper::getHiddenProperty($tree, 'fruits');

        $this->assertEquals($nFruits, count($fruits));

        $tree = new AppleTree(0);
        $nFruits = random_int($tree->getMinFruits(), $tree->getMaxFruits());
        $tree->grow($nFruits);
        $fruits = Helper::getHiddenProperty($tree, 'fruits');
        $nFruits = count($fruits);

        $this->assertGreaterThanOrEqual($tree->getMinFruits(), $nFruits);
        $this->assertLessThanOrEqual($tree->getMaxFruits(), $nFruits);
    }

    /**
     * @test
     */
    public function should_not_grow_twice()
    {
        $tree = new AppleTree(0);
        $nFruits = $tree->getMinFruits();
        $tree->grow($nFruits);
        
        $this->expectException(\Exception::class);
        $tree->grow($nFruits);
    }
}
