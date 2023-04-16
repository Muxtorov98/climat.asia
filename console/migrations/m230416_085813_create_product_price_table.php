<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_price}}`.
 */
class m230416_085813_create_product_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if (Yii::$app->db->getTableSchema('{{%product_price}}', true) != null) {
            $this->dropTable('{{%product_price}}');
        }

        $this->createTable('{{%product_price}}', [
            'id' => $this->primaryKey(),

            'product_id' => $this->integer(11)->notNull(),
            'price' => $this->integer(11)->notNull(),

            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-product_product_id',
            'product_price',
            'product_id'
        );

        $this->addForeignKey(
            'fk-product_product_id',
            'product_price',
            'product_id',
            'products',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        // drops index for column `product_id`
        $this->dropIndex(
            'idx-product_product_id',
            'product_price'
        );

        $this->dropForeignKey(
            'fk-product_product_id',
            'product_price'
        );

        $this->dropTable('{{%product_price}}');
    }
}
