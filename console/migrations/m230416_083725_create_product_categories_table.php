<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_categories}}`.
 */
class m230416_083725_create_product_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        if (Yii::$app->db->getTableSchema('{{%product_categories}}', true) != null) {
            $this->dropTable('{{%product_categories}}');
        }

        $this->createTable('{{%product_categories}}', [
            'id' => $this->primaryKey(),

            'name' => $this->string(255)->unique()->notNull(),
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
        $this->dropTable('{{%product_categories}}');
    }
}
