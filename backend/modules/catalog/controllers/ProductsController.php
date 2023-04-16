<?php

namespace backend\modules\catalog\controllers;

use backend\modules\catalog\forms\ProductCreateFrom;
use backend\modules\catalog\forms\ProductUpdateFrom;
use common\models\Products;
use Yii;
use yii\helpers\Url;
use yii\web\UploadedFile;

/**
* This is the class for controller "ProductsController".
*/
class ProductsController extends \backend\modules\catalog\controllers\base\ProductsController
{
    public function actionCreate()
    {
        $model = new ProductCreateFrom;
        try {
            if ($model->load($_POST)) {
                $model->photoFile = UploadedFile::getInstance($model, 'photoFile');
                if ($model->validate(false)) {
                    $model->uploadPhoto();
                    $model->saveData();
                    Yii::$app->session->setFlash('success', Yii::t('ui', "Данные созданы успешно"));
                    return $this->redirect(['index']);
                } elseif (!\Yii::$app->request->isPost) {
                 $model->load($_GET);
               }
            }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $form = new ProductUpdateFrom($model);
        try {
        if ($form->load($_POST)) {
            $form->photoFile = UploadedFile::getInstance($form, 'photoFile');
            if ($form->photoFile !== null) {
                $form->updatePhoto();
            }
            $form->saveData();
            return $this->redirect(Url::previous());
           } elseif (!\Yii::$app->request->isPost) {
              $model->load($_GET);
           }
        } catch (\Exception $e) {
            $msg = (isset($e->errorInfo[2]))?$e->errorInfo[2]:$e->getMessage();
            $model->addError('_exception', $msg);
        }
        return $this->render('update', [
            'model' => $form
        ]);

    }
}
