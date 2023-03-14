<?php

namespace OborotRu\Fruits;


abstract class Fruit
{
    protected int $weight;

    public function getWeight(): int
    {
        return $this->weight;
    }
}
