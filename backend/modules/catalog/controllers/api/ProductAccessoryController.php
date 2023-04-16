<?php

namespace backend\modules\catalog\controllers\api;

/**
* This is the class for REST controller "ProductAccessoryController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ProductAccessoryController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\ProductAccessory';
}
