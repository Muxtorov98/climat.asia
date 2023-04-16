<?php

namespace common\models;

use Yii;
use \common\models\base\RelPrCt as BaseRelPrCt;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "rel_pr_ct".
 */
class RelPrCt extends BaseRelPrCt
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
