<?php

namespace OborotRu;

use OborotRu\Trees\Tree;


class Garden
{
    private array $trees = [];

    public function addTree(Tree $tree)
    {
        $this->trees[] = $tree;
    }

    public function getTrees(): array
    {
        return $this->trees;
    }

    public function getFruitsWeight(): int
    {
        $weight = 0;
        foreach ($this->trees as $tree) {
            $weight += $tree->getFruitsWeight();
        }
        return floor($weight / 1000);
    }
}
