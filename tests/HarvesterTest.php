<?php

namespace Tests;

use OborotRu\Fruits\{Apple, Pear};
use OborotRu\Trees\{AppleTree, PearTree};
use OborotRu\{Harvester, Garden};
use PHPUnit\Framework\TestCase;


class HarvesterTest extends TestCase
{

    /**
     * @test
     */
    public function should_init_correctly()
    {
        $garden = new Garden();
        $harvester = new Harvester($garden);

        $garden2 = Helper::getHiddenProperty($harvester, 'garden');
        $this->assertEquals($garden, $garden2);
    }

    
    public function should_proccess_empty_trees()
    {

    }

    /**
     * @test
     */
    public function should_harvest()
    {
        $garden = new Garden();
        $garden->addTree(new AppleTree(0));
        $garden->addTree(new AppleTree(0));
        $garden->addTree(new PearTree(0));

        $trees = $garden->getTrees();
        foreach ($trees as $tree) {
            $nFruits = random_int($tree->getMinFruits(), $tree->getMaxFruits());
            $tree->grow($nFruits);
        }

        $nApplesBefore = count(Helper::getHiddenProperty($trees[0], 'fruits'));
        $nApplesBefore += count(Helper::getHiddenProperty($trees[1], 'fruits'));
        $nPearsBefore = count(Helper::getHiddenProperty($trees[2], 'fruits'));
        
        $harvester = new Harvester($garden);
        $harvest = $harvester->harvest();

        $nApplesAfter = count(Helper::getHiddenProperty($trees[0], 'fruits'));
        $nApplesAfter += count(Helper::getHiddenProperty($trees[1], 'fruits'));
        $nPearsAfter = count(Helper::getHiddenProperty($trees[2], 'fruits'));

        $this->assertEquals(count($harvest->apples), $nApplesBefore);
        $this->assertEquals(count($harvest->pears), $nPearsBefore);

        $this->assertEquals(0, $nApplesAfter);
        $this->assertEquals(0, $nPearsAfter);

        foreach ($harvest->apples as $apple) {
            $this->assertInstanceOf(Apple::class, $apple);
        }

        foreach ($harvest->pears as $pear) {
            $this->assertInstanceOf(Pear::class, $pear);
        }
    }
}
