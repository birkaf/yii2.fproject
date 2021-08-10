<?php


namespace app\models;


use yii\db\ActiveRecord;

class Author extends ActiveRecord
{

    public static function tableName()
    {
        return 'authors';
    }
    public function getBook()
    {
        return $this->hasMany(Book::class,['id' => 'id_book'])
            ->viaTable('bookauthor', ['id_author' => 'id']);
    }

//    public function getBookAuthor()
//    {
//        return $this->hasMany(BookAuthor::class,['id_author' => 'id']);
//    }
    public function rules()
    {
        return [
            [['name','fam','otch'], 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'Имя',
            'fam' => 'Фамилия',
            'otch' => 'Отчество',
        ];
    }
}