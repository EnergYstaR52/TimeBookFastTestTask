<?php
namespace app\modules\api\v1\controllers;

use yii\rest\ActiveController;

class BookController extends ActiveController
{

    public $modelClass = 'app\models\Book';

    protected function verbs()
    {
//        return [
//            'index' => ['GET', 'HEAD'],
//            'view' => ['GET', 'HEAD'],
//            'create' => ['POST'],
//            'update' => ['PUT', 'PATCH'],
//            'delete' => ['DELETE'],
//            'test' => ['GET'],
//        ];
    }

//    public function actionTest() {
//
//        return ['haha' => 'dsdsd'];
//    }
}