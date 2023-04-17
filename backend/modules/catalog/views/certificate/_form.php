<?php

use kartik\file\FileInput;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use \dmstr\bootstrap\Tabs;
use yii\helpers\StringHelper;

/**
* @var yii\web\View $this
* @var common\models\Certificate $model
* @var yii\widgets\ActiveForm $form
*/

?>

<div class="certificate-form">

    <?php $form = ActiveForm::begin([
    'id' => 'Certificate',
    'enableClientValidation' => true,
    'errorSummaryCssClass' => 'error-summary alert alert-danger',
    'options' => ['enctype' => 'multipart/form-data'],
    'fieldConfig' => [
             'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
             'horizontalCssClasses' => [
                 'label' => 'col-sm-2',
                 # 'offset' => 'col-sm-offset-4',
                 'wrapper' => 'col-sm-8',
                 'error' => '',
                 'hint' => '',
             ],
         ],
    ]
    );
    ?>

    <div class="">
        <p style="">
<!-- attribute images -->
            <?= $form->field($model, 'photoFile[]')->widget(FileInput::class, [
                'options' => [
                    'multiple' => true,
                    'accept' => 'image/*',
                ],
                'pluginOptions' => [
//                    'initialPreview' => [
//                        Html::img('/uploads/photos/certificate/certificate_83-1681763288835.png', ['class' => 'file-preview-image', 'alt' => 'Default Image']),
//                    ],
                    'initialPreviewConfig' => [
                        ['caption' => 'Moon.jpg', 'size' => '873727'],
                        ['caption' => 'Earth.jpg', 'size' => '1287883'],
                    ],
                    'overwriteInitial' => false,
                    'maxFileSize' => 220,
                ],
            ]) ?>
        </p>

        <hr/>

        <?php ActiveForm::end(); ?>

    </div>

</div>

