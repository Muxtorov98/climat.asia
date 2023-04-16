<?php

namespace backend\modules\catalog\controllers;

use common\models\BrandCategories;
use Yii;

/**
* This is the class for controller "BrandCategoriesController".
*/
class BrandCategoriesController extends \backend\modules\catalog\controllers\base\BrandCategoriesController
{
    public function actionCreate()
    {
        $model = new BrandCategories;

        try {
            if ($model->load($_POST) && $model->save()) {
                Yii::$app->session->setFlash('success', Yii::t('ui', "Данные созданы успешно"));
                return $this->redirect(['index']);
            } elseif (!\Yii::$app->request->isPost) {
                $model->load($_GET);
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', ['model' => $model]);
    }
}
