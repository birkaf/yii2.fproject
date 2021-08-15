<?php

namespace app\modules\api\v1\models;

use app\models\Author;
use Yii;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $title
 * @property int $page
 */
class Books extends \yii\db\ActiveRecord
{
//    const SCENARIO_UPDATE = 'update';
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }
    public function getAuthor()
    {
        return $this->hasMany(Author::class,['id' => 'id_author'])
            ->viaTable('bookauthor', ['id_book' => 'id']);
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'page'], 'required'],
            [['page'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }
//    public function scenarios()
//    {
//        $scenarios = parent::scenarios();
//        $scenarios ['update'] = ['title','page'];
//        return $scenarios;
//    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название книги',
            'page' => 'Количество страниц',
        ];
    }
}
