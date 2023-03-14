<?php

namespace OborotRu\Trees;


abstract class Tree
{
    protected int $minFruits = 40;
    protected int $maxFruits = 50;

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

    public function harvest(): array
    {
        $fruits = $this->fruits;
        $this->fruits = [];
        
        return $fruits;
    }
}
