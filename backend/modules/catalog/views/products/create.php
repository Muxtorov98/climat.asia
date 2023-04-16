<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Products $model
*/

$this->title = Yii::t('models', 'Products');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud products-create">


    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
