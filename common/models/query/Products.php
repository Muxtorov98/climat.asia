<?php

namespace common\models\query;

/**
 * This is the ActiveQuery class for [[\common\models\Products]].
 *
 * @see \common\models\Products
 */
class Products extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return \common\models\Products[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Products|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function sort_desc()
    {
        return $this->orderBy(['id' => SORT_DESC]);
    }

    public function no_deleted()
    {
        return $this->andWhere(['is_deleted' => 0]);
    }
}
