<?php

namespace OborotRu;


class Statistics
{
    private Harvest $harvest;

    public function __construct(Harvest $harvest)
    {
        $this->harvest = $harvest;
    }

    public function applesCount(): int
    {
        return count($this->harvest->apples);
    }

    public function pearsCount(): int
    {
        return count($this->harvest->pears);
    }

    public function totalWeight(): int
    {
        $weight = $this->getWeight($this->harvest->apples);
        $weight += $this->getWeight($this->harvest->pears);

        return $weight;
    }

    private function getWeight(array $fruits): int
    {
        return array_reduce(
            $fruits,
            function ($sum, $fruit) {
                return $sum + $fruit->getWeight();
            }
        );
    }
}
