<?php

namespace common\models;

use Yii;
use \common\models\base\ProductAccessory as BaseProductAccessory;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_accessory".
 */
class ProductAccessory extends BaseProductAccessory
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
