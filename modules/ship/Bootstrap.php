<?php

namespace app\modules\ship;

use yii\base\BootstrapInterface;
 
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([]);
    }
}
