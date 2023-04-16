<?php

namespace backend\modules\catalog\controllers\api;

/**
* This is the class for REST controller "BrandCategoriesController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class BrandCategoriesController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\BrandCategories';
}
