<?php


namespace app\controllers;


use app\models\Author;
use app\models\Book;
use app\models\BookAuthor;
use yii\helpers\ArrayHelper;
use yii\web\Controller;

class BookController extends Controller
{


    public function actionAdd()
    {
        $this->view->title = 'Добавление новой книги';
        $book = new Book();
        $bookauthor = new BookAuthor();
        $authors = ArrayHelper::map(Author::find()->asArray()->all(),'id', 'fam');
        if($book->load(\Yii::$app->request->post())){
            $transaction = \Yii::$app->getDb()->beginTransaction();
            if(!$book->save() || !$bookauthor->saveBookAuthors(\Yii::$app->request->post('BookAuthor')['id_author'], $book->id)){
                \Yii::$app->session->setFlash('error','Ошибка при добавлении книги');
                $transaction->rollBack();
            }else{
                $transaction->commit();
                \Yii::$app->session->setFlash('success','Книга добавлена');
                return $this->refresh();
            }
        }
        return $this->render('add',compact('book','authors','bookauthor'));
    }
    public function actionEdit($id)
    {
        $this->view->title = 'Редактирование книги';
        $book = Book::findOne($id);
        $bookauthor = new BookAuthor();
        $authors = ArrayHelper::map(Author::find()->asArray()->all(),'id', 'fam');
        if(empty($book)){
            return false;
        }
        if($book->load(\Yii::$app->request->post())){
            $transaction = \Yii::$app->getDb()->beginTransaction();
            if(!$book->save() || !$bookauthor->updateBookAuthors(\Yii::$app->request->post('BookAuthor')['id_author'], $id)){
                \Yii::$app->session->setFlash('error','Ошибка при добавлении книги');
                $transaction->rollBack();
            }else{
                $transaction->commit();
                \Yii::$app->session->setFlash('success','Изменения сохранены');
                $books = Book::find()->with('author')->all();
                $this->view->title = 'Список книг';
                return $this->render('index',compact('books'));
            }
        }
        return $this->render('edit',compact('book','authors', 'bookauthor'));
    }
    public function actionDelete($id)
    {
        $book = Book::findOne($id);
        if($book){
            if (false !== $book->delete() && false !== BookAuthor::deleteAll(['id_book' => $id])){
                \Yii::$app->session->setFlash('success','Книга удалёна');
                $books = Book::find()->with('author')->all();
                $this->view->title = 'Список книг';
                return $this->render('index',compact('books'));
            }else{
                \Yii::$app->session->setFlash('error','Ошибка при удалении');
            }
        }

    }
    public function actionIndex()
    {
        $books = Book::find()->with('author')->all();
        $this->view->title = 'Список книг';
        return $this->render('index',compact('books'));
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
}