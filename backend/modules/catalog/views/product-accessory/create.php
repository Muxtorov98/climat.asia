<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\ProductAccessory $model
*/

$this->title = Yii::t('models', 'Product Accessory');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Product Accessories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud product-accessory-create">


    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
