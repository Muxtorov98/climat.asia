<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\BrandCategories $model
*/

$this->title = Yii::t('models', '');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Brand Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>

<div class="giiant-crud brand-categories-update">

    <h1>
        <?= Yii::t('models', 'Brand Categories') ?>
        <small>
                        <?= Html::encode($model->name) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>



    <?php echo $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
