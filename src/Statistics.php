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

        return floor($weight / 1000);
    }

    private function getWeight(array $fruits): int
    {
        if (empty($fruits)) return 0;

        return array_reduce(
            $fruits,
            function ($sum, $fruit) {
                return $sum + $fruit->getWeight();
            }
        );
    }
}
