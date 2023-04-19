<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contact_info}}`.
 */
class m230419_192706_create_contact_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contact_info}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contact_info}}');
    }
}
