<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ProductPrice]].
 *
 * @see \common\models\ProductPrice
 */
class ProductPrice extends \yii\db\ActiveQuery
{
    const STATUS_ACTIVE = 1;
    public function active()
    {
        return $this->andWhere(['status' => self::STATUS_ACTIVE]);

    }
    /**
     * @inheritdoc
     * @return \common\models\ProductPrice[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ProductPrice|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function byProductId(int $product_id)
    {
        return $this->andWhere(['product_id' => $product_id]);
    }
}
