<?php

namespace app\commands;

use yii\console\ExitCode;
use yii\console\Controller;
use app\modules\auth\models\User;
use app\modules\blog\models\Materials;

class SeedController extends Controller
{
    public function actionMaterials()
    {
        $faker = \Faker\Factory::create();

        for ($i = 1; $i <= 100; $i++) {
            $materials        = new Materials();
            $materials->title = $faker->sentence(3);
            $materials->slug  = $faker->word();
            $materials->text  = $faker->text(100);

            $materials->save();
        }
    }

    public function actionUser()
    {
        $user           = new User();
        $user->username = 'admin';
        $user->email    = 'admin@admin.com';

        $user->setPassword('password');
        $user->generateAuthKey();
        $user->save();
    }
}
