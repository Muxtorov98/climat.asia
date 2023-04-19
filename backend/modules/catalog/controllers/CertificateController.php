<?php

namespace backend\modules\catalog\controllers;

use common\models\Certificate;
use Yii;
use yii\web\UploadedFile;

/**
* This is the class for controller "CertificateController".
*/
class CertificateController extends \backend\modules\catalog\controllers\base\CertificateController
{

    public function actionCreate()
    {
        $model = new Certificate();

        try {
            if ($model->load($_POST)) {
                $model->photoFile = UploadedFile::getInstances($model, 'photoFile');
                if ($model->validate(false)) {
                    $model->uploadPhoto();
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

    public function actionView($id)
    {
        return $this->renderAjax('view', [
            'model' => $this->findModel($id),
        ]);
    }


    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        if ($model->delete()){
            $model->deletePhoto();
            Yii::$app->session->setFlash('success', Yii::t('ui', "Rasim o`chirildi"));
            return $this->redirect(['index']);
        }else{
            return $this->renderAjax('view', [
                'model' => $model,
            ]);
        }

    }

}
