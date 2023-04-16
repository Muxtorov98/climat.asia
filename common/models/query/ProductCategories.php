<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\ProductCategories]].
 *
 * @see \common\models\ProductCategories
 */
class ProductCategories extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\ProductCategories[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\ProductCategories|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
