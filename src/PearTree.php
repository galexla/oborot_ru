<?php

namespace OborotRu;


class PearTree extends Tree
{
    protected int $minFruits = 0;
    protected int $maxFruits = 20;

    public function grow(int $nFruits = -1)
    {
        if ($nFruits < 0) {
            $nFruits = random_int($this->minFruits, $this->maxFruits);
        } elseif ($nFruits < $this->minFruits || $nFruits > $this->maxFruits) {
            throw new \Exception("Invalid value $nFruits for \$nFruits");
        }
        for ($i = 0; $i < $nFruits; $i++) {
            $this->fruits[] = new Pear();
        }
    }
}
