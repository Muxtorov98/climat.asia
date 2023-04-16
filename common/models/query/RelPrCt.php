<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\RelPrCt]].
 *
 * @see \common\models\RelPrCt
 */
class RelPrCt extends \yii\db\ActiveQuery
{
    const STATUS_ACTIVE = 1;
    public function active()
    {
        return $this->andWhere(['status' => self::STATUS_ACTIVE]);

    }
    /**
     * @inheritdoc
     * @return \common\models\RelPrCt[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\RelPrCt|array|null
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
