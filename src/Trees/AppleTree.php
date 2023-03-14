<?php

namespace OborotRu\Trees;

use OborotRu\Fruits\Apple;


class AppleTree extends Tree
{
    protected int $minFruits = 40;
    protected int $maxFruits = 50;

    public function grow(int $nFruits)
    {
        parent::grow($nFruits);
        
        for ($i = 0; $i < $nFruits; $i++) {
            $this->fruits[] = new Apple();
        }
    }
}
