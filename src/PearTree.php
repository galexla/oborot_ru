<?php

namespace OborotRu;


class PearTree extends Tree
{
    protected int $minFruits = 0;
    protected int $maxFruits = 20;

    public function grow()
    {
        $nFruits = random_int($this->minFruits, $this->maxFruits);
        for ($i = 0; $i < $nFruits; $i++) {
            $this->fruits[] = new Pear();
        }
    }
}
