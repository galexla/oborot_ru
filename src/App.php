<?php

namespace OborotRu;

use OborotRu\Trees\{AppleTree, PearTree};


class App
{
    private int $nAppleTrees;
    private int $nPearTrees;
    private Garden $garden;

    public function __construct(int $nAppleTrees = 10, int $nPearTrees = 15)
    {
        if ($nAppleTrees < 0) {
            throw new \InvalidArgumentException("Invalid value $nAppleTrees for \$nAppleTrees");
        } elseif ($nPearTrees < 0) {
            throw new \InvalidArgumentException("Invalid value $nPearTrees for \$nPearTrees");
        }

        $this->nAppleTrees = $nAppleTrees;
        $this->nPearTrees = $nPearTrees;

        $this->garden = new Garden();

        for ($i = 0; $i < $this->nAppleTrees; $i++) {
            $tree = new AppleTree($i);
            $this->garden->addTree($tree);
            $nFruits = random_int($tree->getMinFruits(), $tree->getMaxFruits());
            $tree->grow($nFruits);
        }

        for ($i = 0; $i < $this->nPearTrees; $i++) {
            $tree = new PearTree($i + $this->nAppleTrees);
            $this->garden->addTree($tree);
            $nFruits = random_int($tree->getMinFruits(), $tree->getMaxFruits());
            $tree->grow($nFruits);
        }
    }

    public function run()
    {
        $harvester = new Harvester($this->garden);
        $harvest = $harvester->harvest();

        $stats = new Statistics($harvest);
        $this->printStatistics($stats);
    }

    private function printStatistics(Statistics $stats)
    {
        printf(
            "Урожай:\n  яблоки: %d шт\n  груши: %d шт\n  общий вес: %d кг\n",
            $stats->getApplesCount(),
            $stats->getPearsCount(),
            $stats->getTotalWeight()
        );
    }
}
