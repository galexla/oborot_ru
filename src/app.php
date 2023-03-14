<?php

namespace OborotRu;

require_once(__DIR__ . '/../vendor/autoload.php');


$nAppleTrees = 10;
$nPearTrees = 15;
$garden = new Garden();

for ($i = 0; $i < $nAppleTrees; $i++) {
    $tree = new AppleTree($i);
    $garden->addTree($tree);
    $tree->grow();
}

for ($i = 0; $i < $nPearTrees; $i++) {
    $tree = new PearTree($i + $nAppleTrees);
    $garden->addTree($tree);
    $tree->grow();
}

$harvester = new Harvester($garden);
$harvest = $harvester->harvest();

$statistics = new Statistics($harvest);

printf(
    "Урожай:\n  яблоки: %d шт\n  груши: %d шт\n  общий вес: %d кг",
    $statistics->applesCount(),
    $statistics->pearsCount(),
    $statistics->totalWeight()
);
