<?php

namespace OborotRu;

use OborotRu\Trees\{AppleTree, PearTree};


class Harvester
{
    private Garden $garden;

    public function __construct(Garden $garden)
    {
        $this->garden = $garden;
    }

    public function harvest(): Harvest
    {
        $harvest = new Harvest();

        foreach ($this->garden->getTrees() as $tree) {
            $fruits = $tree->harvest();

            if ($tree instanceof AppleTree) {
                array_push($harvest->apples, ...$fruits);
            } elseif ($tree instanceof PearTree) {
                array_push($harvest->pears, ...$fruits);
            } else {
                throw new \Exception();
            }
        }

        return $harvest;
    }
}
