<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_accessory}}`.
 */
class m230416_084319_create_product_accessory_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (Yii::$app->db->getTableSchema('{{%product_accessory}}', true) != null) {
            $this->dropTable('{{%product_accessory}}');
        }

        $this->createTable('{{%product_accessory}}', [
            'id' => $this->primaryKey(),

            'name_uz' => $this->string(255)->null(),
            'name_ru' => $this->string(255)->unique()->notNull(),

            'image' => $this->string(255)->null(),
            'url' => $this->string(255)->unique()->null(),

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
        $this->dropTable('{{%product_accessory}}');
    }
}
