<?php

namespace app\modules\ship;

use yii\base\BootstrapInterface;
 
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules([
            // 'PUT,PATCH users/<id>' => 'user/update',
            // 'DELETE users/<id>' => 'user/delete',
            // 'GET,HEAD users/<id>' => 'user/view',
            // 'POST users' => 'user/create',
            // 'GET,HEAD users' => 'user/index',
            // 'users/<id>' => 'user/options',
            // 'users' => 'user/options',
        ]);
    }
}
