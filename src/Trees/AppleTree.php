<?php

namespace OborotRu\Trees;

use OborotRu\Fruits\Apple;


class AppleTree extends Tree
{
    protected int $minFruits = 40;
    protected int $maxFruits = 50;

    public function grow(int $nFruits = -1)
    {
        if (!empty($this->fruits)) {
            throw new \Exception("You can only grow trees once.");
        }

        if ($nFruits < 0) {
            $nFruits = random_int($this->minFruits, $this->maxFruits);
        } elseif ($nFruits < $this->minFruits || $nFruits > $this->maxFruits) {
            throw new \InvalidArgumentException("Invalid value $nFruits for \$nFruits");
        }
        
        for ($i = 0; $i < $nFruits; $i++) {
            $this->fruits[] = new Apple();
        }
    }
}
