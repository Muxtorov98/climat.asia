<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use yii\widgets\DetailView;
use yii\widgets\Pjax;
use dmstr\bootstrap\Tabs;

/**
* @var yii\web\View $this
* @var common\models\Products $model
*/
$copyParams = $model->attributes;

$this->title = Yii::t('models', 'Products');
$this->params['breadcrumbs'][] = ['label' => Yii::t('models', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => (string)$model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'View';
?>
<div class="giiant-crud products-view">

    <!-- flash message -->
    <?php if (\Yii::$app->session->getFlash('deleteError') !== null) : ?>
        <span class="alert alert-info alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
            <?= \Yii::$app->session->getFlash('deleteError') ?>
        </span>
    <?php endif; ?>

    <h1>
        <?= Yii::t('models', 'Products') ?>
        <small>
            <?= Html::encode($model->name) ?>
        </small>
    </h1>


    <div class="clearfix crud-navigation">

        <!-- menu buttons -->
        <div class='pull-left'>
            <?= Html::a(
                '<span class="glyphicon glyphicon-pencil"></span> ' . Yii::t('ui', 'Редактировать'),
                ['update', 'id' => $model->id],
                ['class' => 'btn btn-info']) ?>

            <?= Html::a(
                '<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('ui', "Добавить"),
                ['create'],
                ['class' => 'btn btn-success']) ?>
        </div>

        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-list"></span> '
                . Yii::t('ui', "Полный список"), ['index'], ['class' => 'btn btn-warning']) ?>
        </div>


    </div>

    <hr/>

    <?php $this->beginBlock('common\models\Products'); ?>

    
    <?= DetailView::widget([
    'model' => $model,
    'attributes' => [
        'name',
        'text:ntext',
       // 'viewed',
        'status',
        [
            'attribute' => 'image',
            'value' => $model->getPhotoSrc(),
            'format' => ['image', ['width' => 100, 'height' => 100]]
        ],
        'description',
    ],
    ]); ?>

    
    <hr/>

    <?= Html::a('<span class="glyphicon glyphicon-trash"></span> ' . 'Delete', ['delete', 'id' => $model->id],
    [
    'class' => 'btn btn-danger',
    'data-confirm' => '' . 'Are you sure to delete this item?' . '',
    'data-method' => 'post',
    ]); ?>
    <?php $this->endBlock(); ?>

    <?= Tabs::widget(
        [
            'id' => 'relation-tabs',
            'encodeLabels' => false,
            'items' => [
                [
                    'label'   => '<b class=""># '.Html::encode($model->id).'</b>',
                    'content' => $this->blocks['common\models\Products'],
                    'active'  => true,
                ],
            ]
        ]
    );
    ?>
    

</div>
