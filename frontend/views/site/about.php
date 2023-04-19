<?php
$model = \common\models\Products::find()->one();
?>
<section class="about mega-section" id="about">
	<div class="container">
		<!-- Start first about div-->
        <?= \Yii::$app->view->renderFile('@app/views/component/content-block1.php',
            [
                    'model' => $model
            ]
        ) ?>
        <!--End first about div-->
		<!-- Start first about div-->
<!--        --><?php //= \Yii::$app->view->renderFile('@app/views/component/content-block.php') ?>
		<!--End first about div-->
	</div>
</section>
