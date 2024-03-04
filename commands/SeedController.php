<?php

namespace app\commands;

use app\modules\blog\models\Materials;
use yii\console\Controller;
use yii\console\ExitCode;

class SeedController extends Controller
{
    public function actionMaterials()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $materials        = new Materials();
            $materials->title = $faker->sentence(3);
            $materials->slug  = $faker->sentence(3);
            $materials->text  = $faker->text(100);

            $materials->save();
        }
    }
}
