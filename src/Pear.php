<?php

namespace OborotRu;


class Pear extends Fruit
{
    private int $minWeight = 130;
    private int $maxWeight = 170;

    function __construct(int $weight = 0)
    {
        if ($weight > 0) {
            $this->weight = $weight;
        } else {
            $this->weight = random_int($this->minWeight, $this->maxWeight);
        }
    }
}
