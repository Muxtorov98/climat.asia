<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\ProductCategories $model
*/

$this->title = Yii::t('models', 'Product Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Product Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud product-categories-create">


    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
