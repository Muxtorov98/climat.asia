<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m230416_084511_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (Yii::$app->db->getTableSchema('{{%products}}', true) != null) {
            $this->dropTable('{{%products}}');
        }

        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),

            'url' => $this->string(255)->unique()->null(),

            'name_ru' => $this->string(255)->notNull(),
            'name_uz' => $this->string(255)->null(),
            'image' => $this->string(255)->null(),
            'description_uz' => $this->string(255)->null(),
            'description_ru' => $this->string(255)->null(),
            'text_uz' => $this->text()->null(),
            'text_ru' => $this->text()->null(),
            'viewed' => $this->integer(11)->null(),

            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%products}}');
    }
}
