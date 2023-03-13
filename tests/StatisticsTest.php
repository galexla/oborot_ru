<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use OborotRu\{Harvester, Garden, AppleTree, PearTree, Apple, Pear, Statistics};


class StatisticsTest extends TestCase
{

    /**
     * @test
     */
    public function should_count_weight()
    {
        $garden = new Garden();
        $garden->addTree(new AppleTree(0));
        $garden->addTree(new AppleTree(0));
        $garden->addTree(new PearTree(0));

        $trees = Helper::getHiddenProperty($garden, 'trees');
        $weight = 0;
        foreach ($trees as $tree) {
            $tree->grow();
            $fruits = Helper::getHiddenProperty($tree, 'fruits');
            foreach ($fruits as $fruit) {
                $weight += $fruit->getWeight();
            }
        }

        $harvester = new Harvester($garden);
        $harvest = $harvester->harvest();

        $stats = new Statistics($harvest);

        $this->assertEquals($weight, $stats->totalWeight());
    }
}
