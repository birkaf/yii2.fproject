<?php


namespace app\models;


use yii\db\ActiveRecord;

class Book extends ActiveRecord
{
    public static function tableName()
    {
        return 'books';
    }
    public function getAuthor()
    {
        return $this->hasMany(Author::class,['id' => 'id_author'])
            ->viaTable('bookauthor', ['id_book' => 'id']);
    }
    public function rules()
    {
        return [
            [['title','page'], 'required'],
            ['page','integer'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'title' => 'Название книги',
            'page' => 'Количество страниц',
        ];
    }
    public function extraFields()
    {
        return ['author'];
    }
}