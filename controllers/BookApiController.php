<?php
namespace app\controllers;

use app\models\Book;
use yii\rest\ActiveController;
use yii\web\Response;

class BookApiController extends ActiveController
{
    public $modelClass = 'app\models\Book';
    public function actionList()
    {
        //http://yii2.fproject/book-api/list?expand=author
        //http://yii2.fproject/book-api/list
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return  Book::find()->all();
    }
}