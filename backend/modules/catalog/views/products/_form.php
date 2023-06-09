<?php

use common\helpers\ProductHelper;
use kartik\file\FileInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\Products $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="products-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Products',
    'layout' => 'horizontal',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-2',
                 #'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-8',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="">

        <p>
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>
            <?= $form->field($model, 'photoFile')->widget(FileInput::class,
                [
                    'pluginOptions' => [
                        'showPreview' => false,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false,
                    ]
                ]); ?>
			<?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
			<?= $form->field($model, 'brand_ct_id')->dropDownList(ProductHelper::getBrandUpdateList($model->id)) ?>
			<?= $form->field($model, 'pr_ct_id')->dropDownList(ProductHelper::getPrCtIdList()) ?>
			<?= $form->field($model, 'pr_access_id')->dropDownList(ProductHelper::getPrAccessIdList()) ?>
            <?= $form->field($model, 'status')->dropDownList(ProductHelper::getStatusList()) ?>
        </p>

        <hr/>


        <div class="text-center">
            <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                ('Save'),
                [
                    'id' => 'save-' . $model->formName(),
                    'class' => 'btn btn-success'
                ]
            );
            ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>

</div>

