<?php

namespace backend\modules\catalog\controllers\api;

/**
* This is the class for REST controller "ProductCategoriesController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class ProductCategoriesController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\ProductCategories';
}
