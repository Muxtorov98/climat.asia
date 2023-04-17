<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Certificate $model
*/

$this->title = Yii::t('models', 'Certificate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Certificates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud certificate-create">

    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
