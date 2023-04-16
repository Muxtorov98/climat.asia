<?php

namespace common\models;

use Yii;
use \common\models\base\ProductCategories as BaseProductCategories;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_categories".
 */
class ProductCategories extends BaseProductCategories
{

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }
}
