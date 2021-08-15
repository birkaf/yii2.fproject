<?php

namespace app\modules\api\v1\controllers;
use app\models\Author;
use app\models\BookAuthor;
use \yii\web\Response;
use app\modules\api\v1\models\Books;

class BooksController extends \yii\web\Controller
{
    public $enableCsrfValidation = false;
    public function actionIndex()
    {
        return $this->render('index');
    }
    /*
     * Uptade Book by ID
     * http://yii2.fproject/api/v1/books/update
     * POST id, title, page, [author = 1,2,...]
     * */
    public function actionUpdate()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $book = Books::findOne(\Yii::$app->request->post('id'));
        $book_author = new BookAuthor();

        if(\Yii::$app->request->post('author')){
            $authors_id = explode(',',\Yii::$app->request->post('author'));
            $countAuthors = Author::find()->where(['id' => $authors_id])->count();
            if(count($authors_id) != $countAuthors)
            {
                return array('status'=>false, 'data'=>'В запросе указан ID не существующего автора');
            }
            $new_author = \Yii::$app->request->post('author');
            if (!$book_author->updateBookAuthorsFromPost($new_author, \Yii::$app->request->post('id'))){
                return array('status'=>false, 'data'=>$book_author->getErrors());
            }
        }
        $book->attributes = \Yii::$app->request->post();
        if ($book->save()){
            return array('status'=>true, 'data'=>'Данные книги обновлены');
        } else {
            return array('status'=>false, 'data'=>$book->getErrors());
        }

    }
    /*
     * View All Book with Authors
     * http://yii2.fproject/api/v1/books/list
     * */
    public function actionList()
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return  Books::find()->with('author')->asArray()->all();
    }
    /*
     * View Book by ID
     * http://yii2.fproject/api/v1/books/by-{$id};
     * */
    public function actionView($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        return  Books::findOne($id);
    }
    /*
     * DELETE Book by ID
     * http://yii2.fproject/api/v1/books/{$id};
     * */

    public function actionDelete($id)
    {
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $book = Books::findOne($id);
        if($book){
            if (false !== $book->delete() && false !== BookAuthor::deleteAll(['id_book' => $id])){
                return array('status'=>true, 'data'=>"Книга c ID=$id удалена");
            } else {
                return array('status'=>false, 'data'=>$book->getErrors());
            }
        }
    }
}
