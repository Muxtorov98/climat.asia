<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\BrandCategories]].
 *
 * @see \common\models\BrandCategories
 */
class BrandCategories extends \yii\db\ActiveQuery
{

    const STATUS_ACTIVE = 1;
    public $tableName = 'rel_pr_ct';
    public $tableNameBrand = 'brand_categories';

    public function active()
    {
        return $this->andWhere(['status' => self::STATUS_ACTIVE]);

    }

    /**
     * @inheritdoc
     * @return \common\models\BrandCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\BrandCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function byProductId(int $product_id)
    {
        return $this->andWhere(["$this->tableName.product_id" => $product_id]);
    }

    public function activeJoin()
    {
        return $this->andWhere(["$this->tableNameBrand.status" => self::STATUS_ACTIVE]);

    }

}
