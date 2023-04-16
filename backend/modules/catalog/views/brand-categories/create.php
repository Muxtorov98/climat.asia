<?php

use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\BrandCategories $model
*/

$this->title = Yii::t('models', 'Brand Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Brand Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="giiant-crud brand-categories-create">



    <hr />

    <?= $this->render('_form', [
    'model' => $model,
    ]); ?>

</div>
