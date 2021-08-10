<?php


namespace app\controllers;


use app\models\Author;
use yii\web\Controller;

class AuthorController extends Controller
{
    public function actionAdd()
    {
        $this->view->title = 'Добавление нового автора';
        $author = new Author();

        if($author->load(\Yii::$app->request->post()) && $author->save()){
            \Yii::$app->session->setFlash('success','Автор добавлен');
            return $this->refresh();
        }

        return $this->render('add',compact('author'));
    }
    public function actionEdit($id)
    {
        $this->view->title = 'Редактирование автора';
        $author = Author::findOne($id);
        if(empty($author)){
            return false;
        }

        if($author->load(\Yii::$app->request->post()) && $author->save()){
            \Yii::$app->session->setFlash('success','Изменения сохранены');
            $authors = Author::find()->all();
            $this->view->title = 'Список авторов';
            return $this->render('index',compact('authors'));
        }

        return $this->render('edit',compact('author'));
    }
    public function actionDelete($id)
    {
        $author = Author::findOne($id);
        if($author){
            if (false !== $author->delete()){
                \Yii::$app->session->setFlash('success','Автор удалён');
                $authors = Author::find()->all();
                $this->view->title = 'Список авторов';
                return $this->render('index',compact('authors'));
            }else{
                \Yii::$app->session->setFlash('error','Ошибка при удалении');
            }
        }
    }
    public function actionIndex()
    {
        $this->view->title = 'Список авторов';
        $authors = Author::find()->with('book')->all();
        return $this->render('index',compact('authors'));

    }

}