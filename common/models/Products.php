<?php

namespace common\models;

use Yii;
use \common\models\base\Products as BaseProducts;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "products".
 */
class Products extends BaseProducts
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
