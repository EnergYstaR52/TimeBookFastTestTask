<?php

namespace app\modules\api;

/**
 * admin module definition class
 */
class Module extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'app\modules\api\controllers';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        $this->modules = [
            'v1' => [

                'class' => 'app\modules\api\v1\Module',
            ],
        ];
    }
}
