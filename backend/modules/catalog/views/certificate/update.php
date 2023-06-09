<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Certificate $model
*/

$this->title = Yii::t('models', 'Certificate');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Certificate'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>
<div class="giiant-crud certificate-update">

    <h1>
        <?= Yii::t('models', 'Certificate') ?>
        <small>
                        <?= Html::encode($model->id) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>

    <hr />

    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
