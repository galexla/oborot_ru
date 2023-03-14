<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use OborotRu\Garden;
use OborotRu\Trees\{AppleTree, PearTree};


class GardenTest extends TestCase
{

    /**
     * @test
     */
    public function should_have_correct_trees_array_after_construct()
    {
        $garden = new Garden();
        $trees = Helper::getHiddenProperty($garden, 'trees');
        $this->assertIsArray($trees);
        $this->assertEmpty($trees);
    }

    /**
     * @test
     */
    public function should_add_trees()
    {
        $garden = new Garden();
        $garden->addTree(new AppleTree(0));
        $garden->addTree(new AppleTree(0));
        $garden->addTree(new PearTree(0));

        $trees = Helper::getHiddenProperty($garden, 'trees');
        $nTrees = count($trees);

        $this->assertEquals(3, $nTrees);

        $this->assertInstanceOf(AppleTree::class, $trees[0]);
        $this->assertInstanceOf(AppleTree::class, $trees[1]);
        $this->assertInstanceOf(PearTree::class, $trees[2]);
    }
}
