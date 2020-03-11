<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%book_author}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%book}}`
 * - `{{%author}}`
 */
class m200310_070501_create_junction_table_for_book_and_author_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%book_author}}', [
            'book_id' => $this->integer(),
            'author_id' => $this->integer(),
            'PRIMARY KEY(book_id, author_id)',
        ]);

        // creates index for column `book_id`
        $this->createIndex(
            '{{%idx-book_author-book_id}}',
            '{{%book_author}}',
            'book_id'
        );


        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-book_author-author_id}}',
            '{{%book_author}}',
            'author_id'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {


        // drops index for column `book_id`
        $this->dropIndex(
            '{{%idx-book_author-book_id}}',
            '{{%book_author}}'
        );



        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-book_author-author_id}}',
            '{{%book_author}}'
        );

        $this->dropTable('{{%book_author}}');
    }
}
