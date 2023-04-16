<?php

use yii\helpers\Html;
use yii\helpers\Url;
use kartik\grid\GridView;

/**
* @var yii\web\View $this
* @var yii\data\ActiveDataProvider $dataProvider
    * @var common\models\search\Products $searchModel
*/

$this->title = Yii::t('models', 'Products');
$this->params['breadcrumbs'][] = $this->title;

if (isset($actionColumnTemplates)) {
$actionColumnTemplate = implode(' ', $actionColumnTemplates);
    $actionColumnTemplateString = $actionColumnTemplate;
} else {
Yii::$app->view->params['pageButtons'] = Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']);
    $actionColumnTemplateString = "{view} {update} {delete}";
}
$actionColumnTemplateString = '<div class="action-buttons">'.$actionColumnTemplateString.'</div>';
?>
<div class="giiant-crud products-index">

    
    <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>


    <div class="clearfix crud-navigation">
        <div class="pull-right">
            <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . Yii::t('ui', 'Add'), ['create'], ['class' => 'btn btn-success']) ?>
        </div>
    </div>
    <hr/>
    <div>

        <?php
        $gridColumns = [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => ['style' => 'width: 5%', 'class' => 'text-center'],
                'contentOptions' => ['class' => 'text-center'],
            ],
            [
                'attribute' => 'name',
                'vAlign' => 'middle',
                'width' => '10%',
                'hAlign' => 'left',
            ],
            [
                'attribute' => 'text',
                'width' => '10%',
                'hAlign' => 'center',
            ],
            [
                'attribute' => 'image',
                'width' => '10%',
                'hAlign' => 'center',
            ],
            [
                'attribute' => 'description',
                'width' => '10%',
                'hAlign' => 'center',
            ],

            [
                'attribute' => 'status',
                'width' => '10%',
                'hAlign' => 'center',
            ],
            [
                'class' => 'kartik\grid\ActionColumn',
                'width' => '14%',
                'template' => $actionColumnTemplateString,
                'buttons' => [
                    'view' => function ($url, $model) {
                        $options = [
                            'title' => Yii::t('ui', "Подробная информация"),
                            'aria-label' => Yii::t('ui', "Подробная информация"),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-eye-open"></span>', $url, $options);
                    },
                    'update' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('ui', 'Редактировать'),
                            'aria-label' => Yii::t('ui', 'Редактировать'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', ['update', 'id' => $key], $options);
                    },
                    'delete' => function ($url, $model, $key) {
                        $options = [
                            'title' => Yii::t('ui', 'Удалить'),
                            'aria-label' => Yii::t('ui', 'Удалить'),
                            'data-confirm' => Yii::t('ui', 'uchirmoqchimisz ?'),
                            'data-pjax' => '0',
                        ];
                        return Html::a('<span class="glyphicon glyphicon-trash"></span>', ['delete', 'id' => $key], $options);
                    }
                ],
                'urlCreator' => function ($action, $model, $key, $index) {
                    if ($action === 'view') {
                        $url = Url::to(['view', 'id' => $key]);
                        return $url;
                    }
                },
            ],
        ];

        echo GridView::widget([
            'id' => 'kv-grid-confirmed_list',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => $gridColumns, // check the configuration for grid columns by clicking button above
//            'containerOptions' => ['style' => 'overflow: hidden'], // only set when $responsive = false
            'headerRowOptions' => ['class' => 'kartik-sheet-style'],
            'filterRowOptions' => ['class' => 'kartik-sheet-style'],
            'pjax' => true,
            'showPageSummary' => true,
            'pageSummaryRowOptions' => ['class' => 'kv-page-summary info'],
            'pageSummaryPosition' => GridView::POS_TOP,

            'export' => [
                'fontAwesome' => true
            ],
            'panel' => [
                'type' => GridView::TYPE_PRIMARY,
            ],
            'persistResize' => 10,
            'toggleDataOptions' => ['minCount' => 10],
        ]);
        ?>
    </div>

</div>
<?php \yii\widgets\Pjax::end() ?>


