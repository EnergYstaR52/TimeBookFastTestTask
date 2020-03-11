<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "author".
 *
 * @property int $id
 * @property string|null $name
 *
 * @property BookAuthor[] $bookAuthors
 * @property Book[] $books
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }

    public function  getAuthorsArray() {
        return ArrayHelper::map( $this->find()->all(),'id','name');
    }
    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */

    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->viaTable('book_author', ['author_id' => 'id']);
    }

    public function getBooksCount() {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])->viaTable('book_author', ['author_id' => 'id'])->count();
    }
}
