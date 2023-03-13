<?php

namespace OborotRu;


class AppleTree extends Tree
{
    protected int $minFruits = 40;
    protected int $maxFruits = 50;

    public function grow()
    {
        $nFruits = random_int($this->minFruits, $this->maxFruits);
        for ($i = 0; $i < $nFruits; $i++) {
            $this->fruits[] = new Apple();
        }
    }
}
