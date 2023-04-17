<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p>Tulqin Muxtorov</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form -->
        <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    ['label' => Yii::t('ui', 'Products'), 'url' => ['/catalog/products/index'], 'icon' => 'home'],
                    ['label' => Yii::t('ui', 'Brand-categories'), 'url' => ['/catalog/brand-categories/index'], 'icon' => 'home'],
                    ['label' => Yii::t('ui', 'Product-categories'), 'url' => ['/catalog/product-categories/index'], 'icon' => 'home'],
                    ['label' => Yii::t('ui', 'Product-accessory'), 'url' => ['/catalog/product-accessory/index'], 'icon' => 'home'],
                    ['label' => Yii::t('ui', 'Certificate'), 'url' => ['/catalog/certificate'], 'icon' => 'home'],
                    ['label' => Yii::t('ui', 'Settings'), 'icon' => 'cogs', 'items' => [
                        [
                            'label' => Yii::t('ui', 'Translations'),
                            'url' => ['/settings/source-message/list'],
                            'icon' => 'language'
                        ],
                    ]],
                ],
            ]
        ) ?>

    </section>

</aside>
