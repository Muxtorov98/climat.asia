<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%our_case}}`.
 */
class m230419_192501_create_our_case_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%our_case}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%our_case}}');
    }
}
