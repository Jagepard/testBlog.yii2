<?php

namespace app\modules\admin;

use yii\base\BootstrapInterface;
 
class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        $app->getUrlManager()->addRules(
            [
                'admin'                               => 'admin/materials/index',
                'admin/material/add'                  => 'admin/materials/add',
                'POST admin/material/create'          => 'admin/materials/create',
                'admin/material/edit/<id:\d+>'        => 'admin/materials/edit',
                'POST admin/material/update/<id:\d+>' => 'admin/materials/update',
                'admin/material/delete/<id:\d+>'      => 'admin/materials/delete',
                'admin/material/delimg/<id:\d+>'      => 'admin/materials/delimg',
            ]
        );
    }
}
