<?php

namespace app\models;

use Yii;
use lhs\Yii2SaveRelationsBehavior\SaveRelationsBehavior;
/**
 * This is the model class for table "book".
 *
 * @property int $id
 * @property string|null $title
 * @property string|null $description
 *
 * @property BookAuthor[] $bookAuthors
 * @property Author[] $authors
 */
class Book extends \yii\db\ActiveRecord
{

    public function behaviors()
    {
        return [
            'saveRelations' => [
                'class'     => SaveRelationsBehavior::className(),
                'relations' => [
                    'authors' => ['cascadeDelete' => true],
                ],
            ],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['title', 'description'], 'required']
        ];
    }

    public function fields()
    {
        return ['id','title', 'description', 'authors'];
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Author::className(), ['id' => 'author_id'])->viaTable('book_author', ['book_id' => 'id']);
    }

    public function getAuthorsNames()
    {
       $authors = [];
       foreach ($this->authors as $a) {

           $authors[] = $a->name;

       }
       return implode(',' ,$authors);
    }
}
