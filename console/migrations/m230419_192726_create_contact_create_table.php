<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_create}}`.
 */
class m230419_192726_create_contact_create_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_create}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_create}}');
    }
}
