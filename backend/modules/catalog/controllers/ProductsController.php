<?php

namespace backend\modules\catalog\controllers;

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
        $model = new Products;
        try {
            if ($model->load($_POST)) {
                $model->photoFile = UploadedFile::getInstance($model, 'photoFile');
                if ($model->validate()) {
                    $model->uploadPhoto();
                    $model->save(false);
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

        if ($model->load($_POST)) {
            $model->photoFile = UploadedFile::getInstance($model, 'photoFile');
            if ($model->photoFile !== null) {
                $model->updatePhoto();
            }
            $model->save(false);
            return $this->redirect(Url::previous());
        } else {
            return $this->render('update', [
                'model' => $model,
                'id' => $id
            ]);
        }
    }
}
