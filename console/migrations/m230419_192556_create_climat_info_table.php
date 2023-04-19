<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%climat_info}}`.
 */
class m230419_192556_create_climat_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%climat_info}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%climat_info}}');
    }
}
