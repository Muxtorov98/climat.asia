<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;
use kartik\mpdf\Pdf;
/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\models\search\Certificate $searchModel
 * @var common\models\Certificate $model
 */

$this->title = Yii::t('models', '');
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
    <div class="giiant-crud certificate-index">

        <?php
        //             echo $this->render('_search', ['model' =>$searchModel]);
        ?>


        <?php \yii\widgets\Pjax::begin(['id'=>'pjax-main', 'enableReplaceState'=> false, 'linkSelector'=>'#pjax-main ul.pagination a, th a', 'clientOptions' => ['pjax:success'=>'function(){alert("yo")}']]) ?>

        <h1>
            <?= Yii::t('models', 'Certificates') ?>
            <small>
                List
            </small>
        </h1>
        <div class="clearfix crud-navigation">
            <div class="pull-left">
                <?= Html::a('<span class="glyphicon glyphicon-plus"></span> ' . 'New', ['create'], ['class' => 'btn btn-success']) ?>
            </div>
        </div>
        <hr>
        <?php $models = \common\models\Certificate::find()->all(); ?>
        <div class="row">
            <?php foreach ($models as $ima): ?>
                <a href="<?= \yii\helpers\Url::to(['view', 'id'=> $ima->id], true) ?>" data-toggle="modal" data-target="#exampleModalCenter">
                    <img style="width: 200px; height: 200px; margin: 2px;" src="<?= $ima->getPhotoSrc() ?>" alt="">
                </a>
            <?php endforeach; ?>

        </div>
        <hr />
    </div>

    <!-- Modal -->
    <div class="modal fade bd-example-modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                </div>
            </div>
        </div>
    </div>

<?php \yii\widgets\Pjax::end() ?>

<?php
$js = <<<JS
    $('.modal').on('show.bs.modal', function (e) {
        $(this).find('.modal-body').load(e.relatedTarget.href);
    });
JS;
$this->registerJs($js);
