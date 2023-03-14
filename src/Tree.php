<?php

namespace OborotRu;


abstract class Tree
{
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

    public function harvest(): array
    {
        $fruits = $this->fruits;
        $this->fruits = [];
        
        return $fruits;
    }
}
