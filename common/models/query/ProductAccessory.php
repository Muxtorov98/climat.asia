<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ProductAccessory]].
 *
 * @see \common\models\ProductAccessory
 */
class ProductAccessory extends \yii\db\ActiveQuery
{
    const STATUS_ACTIVE = 1;
    public function active()
    {
        return $this->andWhere(['status' => self::STATUS_ACTIVE]);

    }

    /**
     * @inheritdoc
     * @return \common\models\ProductAccessory[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ProductAccessory|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
