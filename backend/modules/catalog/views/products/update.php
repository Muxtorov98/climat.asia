<?php

use common\helpers\ProductHelper;
use kartik\file\FileInput;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;

/**
* @var yii\web\View $this
* @var common\models\Products $model
*/

$this->title = Yii::t('models', '');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model['name_'.lange_code()], 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Edit';
?>

<div class="giiant-crud products-update">

    <h1>
        <?= Yii::t('models', 'Products') ?>
        <small>
                        <?= Html::encode($model['name_'.lange_code()]) ?>
        </small>
    </h1>

    <div class="crud-navigation">
        <?= Html::a('<span class="glyphicon glyphicon-file"></span> ' . 'View', ['view', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
    </div>
    <hr>

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
            <?= $form->field($model, 'name_uz')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'name_ru')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'text_uz')->textarea(['rows' => 4]) ?>
            <?= $form->field($model, 'text_ru')->textarea(['rows' => 4]) ?>
            <?= $form->field($model, 'photoFile')->widget(FileInput::class,
                [
                    'pluginOptions' => [
                        'showPreview' => false,
                        'showCaption' => true,
                        'showRemove' => true,
                        'showUpload' => false,
                    ]
                ]); ?>
            <?= $form->field($model, 'description_uz')->textarea(['rows' => 4]) ?>
            <?= $form->field($model, 'description_ru')->textarea(['rows' => 4]) ?>
            <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>
            <?= $form->field($model, 'brand_ct_id')->dropDownList(ProductHelper::getBrandList(), ['prompt' => Yii::t('ui', 'Choose...')]) ?>
            <?= $form->field($model, 'pr_ct_id')->dropDownList(ProductHelper::getPrCtIdList(), ['prompt' => Yii::t('ui', 'Choose...')]) ?>
            <?= $form->field($model, 'pr_access_id')->dropDownList(ProductHelper::getPrAccessIdList(), ['prompt' => Yii::t('ui', 'Choose...')]) ?>
            <?= $form->field($model, 'status')->dropDownList(ProductHelper::getStatusList()) ?>
        </p>

        <hr/>

        <?php echo $form->errorSummary($model); ?>
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