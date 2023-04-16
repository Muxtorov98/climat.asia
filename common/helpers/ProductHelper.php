<?php
namespace common\helpers;

use common\models\BrandCategories;
use common\models\ProductAccessory;
use common\models\ProductCategories;
use common\models\Products;
use common\models\RelPrCt;
use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

class ProductHelper
{
    public static function getStatusList(): array
    {
        return [
            Products::STATUS_ACTIVE => Yii::t('models', 'Актив'),
            Products::STATUS_INACTIVE => Yii::t('models', 'Неактив'),
        ];
    }

    public static function getStatusLabel($status): string
    {
        switch ($status) {
            case Products::STATUS_ACTIVE:
                $class = 'label label-success';
                break;
            case Products::STATUS_INACTIVE:
                $class = 'label label-danger';
                break;
            default:
                $class = 'label label-default';
        }

        return Html::tag('span', ArrayHelper::getValue(self::getStatusList(), $status), [
            'class' => $class,
        ]);
    }

    public static function getBrandList(): array
    {
        $brandList = BrandCategories::find()
            ->select('id, name AS name')
            ->active()
            ->asArray()
            ->all();

        return ArrayHelper::map($brandList, 'id', function ($model) {
            return $model['name'];
        });
    }

    public static function getPrCtIdList(): array
    {
        $prCtIdList = ProductCategories::find()
            ->select('id, name AS name')
            ->active()
            ->asArray()
            ->all();

        return ArrayHelper::map($prCtIdList, 'id', function ($model) {
            return $model['name'];
        });
    }


    public static function getPrAccessIdList(): array
    {
        $PrAccessIdList = ProductAccessory::find()
            ->select('id, name AS name')
            ->active()
            ->asArray()
            ->all();

        return ArrayHelper::map($PrAccessIdList, 'id', function ($model) {
            return $model['name'];
        });
    }
}