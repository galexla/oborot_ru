<?php

namespace OborotRu;

use OborotRu\Trees\{AppleTree, PearTree};


class App
{
    private int $nAppleTrees;
    private int $nPearTrees;

    public function __construct(int $nAppleTrees = 10, int $nPearTrees = 15)
    {
        if ($nAppleTrees < 0) {
            throw new \InvalidArgumentException("Invalid value $nAppleTrees for \$nAppleTrees");
        } elseif ($nPearTrees < 0) {
            throw new \InvalidArgumentException("Invalid value $nPearTrees for \$nPearTrees");
        }

        $this->nAppleTrees = $nAppleTrees;
        $this->nPearTrees = $nPearTrees;
    }

    public function run()
    {
        $garden = $this->growGarden($this->nAppleTrees, $this->nPearTrees);

        $harvester = new Harvester($garden);
        $harvest = $harvester->harvest();

        $stats = new Statistics($harvest);
        $this->printStatistics($stats);
    }

    private function growGarden(int $nAppleTrees, int $nPearTrees): Garden
    {
        $garden = new Garden();

        for ($i = 0; $i < $nAppleTrees; $i++) {
            $tree = new AppleTree($i);
            $garden->addTree($tree);
            $tree->grow();
        }

        for ($i = 0; $i < $nPearTrees; $i++) {
            $tree = new PearTree($i + $nAppleTrees);
            $garden->addTree($tree);
            $tree->grow();
        }

        return $garden;
    }

    private function printStatistics(Statistics $stats)
    {
        printf(
            "Урожай:\n  яблоки: %d шт\n  груши: %d шт\n  общий вес: %d кг",
            $stats->applesCount(),
            $stats->pearsCount(),
            $stats->totalWeight()
        );
    }
}
