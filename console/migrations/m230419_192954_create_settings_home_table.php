<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%settings_home}}`.
 */
class m230419_192954_create_settings_home_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%settings_home}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%settings_home}}');
    }
}
