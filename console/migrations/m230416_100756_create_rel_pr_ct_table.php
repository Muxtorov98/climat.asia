<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%rel_pr_ct}}`.
 */
class m230416_100756_create_rel_pr_ct_table extends Migration
{
    /**
     * {@inheritdoc}
     */

    public function safeUp()
    {
        if (Yii::$app->db->getTableSchema('{{%rel_pr_ct}}', true) != null) {
            $this->dropTable('{{%rel_pr_ct}}');
        }

        $this->createTable('{{%rel_pr_ct}}', [
            'id' => $this->primaryKey(),

            'brand_ct_id' => $this->integer(11)->null(),
            'pr_ct_id' => $this->integer(11)->null(),
            'pr_access_id' => $this->integer(11)->null(),

            'status' => $this->tinyInteger(1)->notNull()->defaultValue(1),
            'is_deleted' => $this->tinyInteger(1)->notNull()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'created_by' => $this->integer()->notNull(),
            'updated_by' => $this->integer()->notNull(),
        ]);

        // brand_category_rel_pr_ct_brand_ct_id
        $this->createIndex(
            'idx-brand_category_rel_pr_ct_brand_ct_id',
            'rel_pr_ct',
            'brand_ct_id'
        );

        $this->addForeignKey(
            'fk-brand_category_rel_pr_ct_brand_ct_id',
            'rel_pr_ct',
            'brand_ct_id',
            'brand_categories',
            'id',
            'CASCADE'
        );

        // product_category_rel_pr_ct_brand_ct_id
        $this->createIndex(
            'idx-product_category_rel_pr_ct_brand_ct_id',
            'rel_pr_ct',
            'pr_ct_id'
        );

        $this->addForeignKey(
            'fk-product_category_rel_pr_ct_brand_ct_id',
            'rel_pr_ct',
            'pr_ct_id',
            'product_categories',
            'id',
            'CASCADE'
        );

        // product_accessory_rel_pr_ct_brand_ct_id
        $this->createIndex(
            'idx-product_accessory_rel_pr_ct_brand_ct_id',
            'rel_pr_ct',
            'pr_access_id'
        );

        $this->addForeignKey(
            'fk-product_accessory_rel_pr_ct_brand_ct_id',
            'rel_pr_ct',
            'pr_access_id',
            'product_accessory',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

       // brand_category drops
        $this->dropIndex(
            'idx-brand_category_rel_pr_ct_brand_ct_id',
            'rel_pr_ct'
        );

        $this->dropForeignKey(
            'fk-brand_category_rel_pr_ct_brand_ct_id',
            'rel_pr_ct'
        );

        // product_category drops
        $this->dropIndex(
            'idx-product_category_rel_pr_ct_brand_ct_id',
            'rel_pr_ct'
        );

        $this->dropForeignKey(
            'fk-product_category_rel_pr_ct_brand_ct_id',
            'rel_pr_ct'
        );

        // product_accessory drops
        $this->dropIndex(
            'idx-product_accessory_rel_pr_ct_brand_ct_id',
            'rel_pr_ct'
        );

        $this->dropForeignKey(
            'fk-product_accessory_rel_pr_ct_brand_ct_id',
            'rel_pr_ct'
        );

        $this->dropTable('{{%rel_pr_ct}}');
    }
}
