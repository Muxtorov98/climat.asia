<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
* @var yii\web\View $this
* @var common\models\search\Products $model
* @var yii\widgets\ActiveForm $form
*/
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
    'action' => ['index'],
    'method' => 'get',
    ]); ?>

    		<?= $form->field($model, 'id') ?>

		<?= $form->field($model, 'url') ?>

		<?= $form->field($model, 'name') ?>

		<?= $form->field($model, 'image') ?>

		<?= $form->field($model, 'description') ?>

		<?php // echo $form->field($model, 'text') ?>

		<?php // echo $form->field($model, 'viewed') ?>

		<?php // echo $form->field($model, 'status') ?>

		<?php // echo $form->field($model, 'is_deleted') ?>

		<?php // echo $form->field($model, 'created_at') ?>

		<?php // echo $form->field($model, 'updated_at') ?>

		<?php // echo $form->field($model, 'created_by') ?>

		<?php // echo $form->field($model, 'updated_by') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
