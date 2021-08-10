<?php


namespace app\models;


use yii\db\ActiveRecord;

class BookAuthor extends ActiveRecord
{
    public static function tableName()
    {
        return 'bookauthor';
    }

    public function getBook()
    {
        return $this->hasOne(Book::class,['id' => 'id_book']);
    }
    public function getAuthor()
    {
        return $this->hasOne(Author::class,['id' => 'id_author']);
    }
    public function updateBookAuthors($authors, $id_book)
    {
//        $this->findAll($authors)
        //$bookauthor = BookAuthor::find()->where(['id_book' => $id_book])->all();
//        echo '<pre>';
//        print_r($bookauthor);
//        echo '</pre>';
//        die();
        $this->deleteAll(['id_book' => $id_book]);
        foreach ($authors as $id_author){
            $this->id = null;
            $this->isNewRecord = true;
            $id_author++;
            $this->id_book = $id_book;
            $this->id_author = $id_author;
            if(!$this->save()){
                return false;
            }
        }
        return true;
    }
    public function saveBookAuthors($authors, $id_book)
    {
        foreach ($authors as $id_author){
            $this->id = null;
            $this->isNewRecord = true;
            $id_author++;
            $this->id_book = $id_book;
            $this->id_author = $id_author;
            if(!$this->save()){
                return false;
            }
        }
        return true;
    }
}