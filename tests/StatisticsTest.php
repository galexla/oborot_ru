<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use OborotRu\{Harvester, Garden, Statistics};
use OborotRu\Trees\{AppleTree, PearTree};
use OborotRu\Fruits\{Apple, Pear};


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

        $trees = $garden->getTrees();
        $weight = 0;
        foreach ($trees as $tree) {
            $tree->grow();
            $fruits = Helper::getHiddenProperty($tree, 'fruits');
            foreach ($fruits as $fruit) {
                $weight += $fruit->getWeight();
            }
        }
        $weight = floor($weight / 1000);

        $harvester = new Harvester($garden);
        $harvest = $harvester->harvest();

        $stats = new Statistics($harvest);

        $this->assertEquals($weight, $stats->totalWeight());
    }
}
