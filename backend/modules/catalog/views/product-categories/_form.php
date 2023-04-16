<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\ProductCategories $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="product-categories-form">

    <?php $form = ActiveForm::begin([
    'id' => 'ProductCategories',
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
<!-- attribute name -->
			<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

<!-- attribute image -->
			<?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

<!-- attribute url -->
			<?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
            <!-- attribute status -->
            <?= $form->field($model, 'status')->textInput() ?>
        </p>

        <hr/>

        <?php echo $form->errorSummary($model); ?>

        <div class="text-center">
            <?= Html::submitButton(
                '<span class="glyphicon glyphicon-check"></span> ' .
                ($model->isNewRecord ? 'Create' : 'Save'),
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

