<?php

namespace OborotRu;


abstract class Tree
{
    protected int $regNumber;
    protected array $fruits = [];
    protected int $minFruits;
    protected int $maxFruits;

    public function __construct($regNumber)
    {
        $this->regNumber = $regNumber;
    }

    public abstract function grow();

    public function getRegNumber(): int
    {
        return $this->regNumber;
    }
}
