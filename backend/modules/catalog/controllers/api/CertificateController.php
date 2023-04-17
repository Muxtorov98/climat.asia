<?php

namespace backend\modules\catalog\controllers\api;

/**
* This is the class for REST controller "CertificateController".
*/

use yii\filters\AccessControl;
use yii\helpers\ArrayHelper;

class CertificateController extends \yii\rest\ActiveController
{
public $modelClass = 'common\models\Certificate';
}
