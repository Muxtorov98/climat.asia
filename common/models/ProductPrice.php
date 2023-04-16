<?php

namespace common\models;

use Yii;
use \common\models\base\ProductPrice as BaseProductPrice;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_price".
 */
class ProductPrice extends BaseProductPrice
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
