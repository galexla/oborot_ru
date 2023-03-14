<?php

namespace Tests;

use OborotRu\App;
use OborotRu\Trees\{AppleTree, PearTree};
use PHPUnit\Framework\TestCase;


class AppTest extends TestCase
{

    /**
     * @test
     */
    public function should_show_correct_output1()
    {
        $this->should_show_correct_output_w_params(0, 0);
    }

    /**
     * @test
     */
    public function should_show_correct_output2()
    {
        $this->should_show_correct_output_w_params(2, 3);
    }

    private function should_show_correct_output_w_params(int $nAppleTrees, int $nPearTrees)
    {
        $app = new App($nAppleTrees, $nPearTrees);

        $garden = Helper::getHiddenProperty($app, 'garden');
        $trees = $garden->getTrees();

        $nApples = 0;
        $nPears = 0;
        foreach ($trees as $tree) {
            if ($tree instanceof AppleTree) {
                $nApples += $tree->getFruitsCount();
            } elseif ($tree instanceof PearTree) {
                $nPears += $tree->getFruitsCount();
            }
        }

        $totalWeight = $garden->getFruitsWeight();

        $msg = "Урожай:\n  яблоки: $nApples шт\n  груши: $nPears шт\n  общий вес: $totalWeight кг\n";

        $this->expectOutputString($msg);
        $app->run();
    }
}
