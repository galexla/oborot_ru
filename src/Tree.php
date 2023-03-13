<?php

namespace OborotRu;


abstract class Tree
{
    protected array $fruits = [];
    protected int $minFruits;
    protected int $maxFruits;

    public abstract function grow();
}
