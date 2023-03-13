<?php

namespace OborotRu;


class Apple extends Fruit
{
    private int $minWeight = 150;
    private int $maxWeight = 180;

    function __construct()
    {
        $this->weight = random_int($this->minWeight, $this->maxWeight);
    }
}
