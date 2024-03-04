<?php

namespace app\modules\auth;

use yii\base\BootstrapInterface;
 
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([
            'logout' => 'auth/default/logout', 
            'login'  => 'auth/default/login', 
        ]);
    }
}
