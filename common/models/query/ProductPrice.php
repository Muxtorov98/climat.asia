<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ProductPrice]].
 *
 * @see \common\models\ProductPrice
 */
class ProductPrice extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

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
}
