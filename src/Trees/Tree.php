<?php

namespace OborotRu\Trees;


abstract class Tree
{
    protected int $minFruits;
    protected int $maxFruits;

    protected int $regNumber;
    protected array $fruits = [];

    public function __construct($regNumber)
    {
        $this->regNumber = $regNumber;
    }

    public abstract function grow(int $nFruits = -1);

    public function getRegNumber(): int
    {
        return $this->regNumber;
    }

    public function getMinFruits(): int
    {
        return $this->minFruits;
    }

    public function getMaxFruits(): int
    {
        return $this->maxFruits;
    }

    public function getFruitsCount(): int
    {
        return count($this->fruits);
    }

    public function getFruitsWeight(): int
    {
        $weight = 0;
        foreach ($this->fruits as $fruit) {
            $weight += $fruit->getWeight();
        }
        return $weight;
    }

    public function harvest(): array
    {
        $fruits = $this->fruits;
        $this->fruits = [];
        
        return $fruits;
    }
}
