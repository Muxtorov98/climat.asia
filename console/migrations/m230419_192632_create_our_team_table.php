<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%our_team}}`.
 */
class m230419_192632_create_our_team_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%our_team}}', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%our_team}}');
    }
}
