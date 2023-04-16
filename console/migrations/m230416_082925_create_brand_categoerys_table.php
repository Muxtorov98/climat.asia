<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%brand_categoerys}}`.
 */
class m230416_082925_create_brand_categoerys_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        if (Yii::$app->db->getTableSchema('{{%brand_categories}}', true) != null) {
            $this->dropTable('{{%brand_categories}}');
        }

        $this->createTable('{{%brand_categories}}', [
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
        $this->dropTable('{{%brand_categoerys}}');
    }
}
