<?php

namespace app\modules\blog;

use yii\base\BootstrapInterface;
 
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules(
            [
                ''                    => 'blog/default/index', 
                'material/<slug:\w+>' => 'blog/default/item',
            ]
        );
    }
}
