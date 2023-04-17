<?php

namespace common\models;

use dmstr\db\tests\unit\Product;
use Yii;
use \common\models\base\ProductPrice as BaseProductPrice;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "product_price".
 */
class ProductPrice extends BaseProductPrice
{

    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    public function beforeSave($insert)
    {
        if (parent::beforeSave($insert)) {
            $related = $this->getRelatedRecords();
            /** @var Products $products */
            if (isset($related['products']) && $products = $related['products']) {
                $this->product_id = $products->id;
            }
            return true;
        }
        return false;
    }

    public function behaviors()
    {
        return ArrayHelper::merge(
            parent::behaviors(),
            [
                # custom behaviors
            ]
        );
    }

    public function rules()
    {
        return ArrayHelper::merge(
            parent::rules(),
            [
                # custom validation rules
            ]
        );
    }

    #region iSOLID
    public static function create(
        Products $products,
        $price
    )
    {
        $newModel = new ProductPrice;
        $newModel->populateRelation('products', $products);
        $newModel->price = $price;
        return $newModel;
    }

    public static function createByProductId(
        $product_id,
        $price
    )
    {
        $model = new ProductPrice();
        $model->product_id = $product_id;
        $model->price = $price;
        $model->status = self::STATUS_ACTIVE;
        return $model;
    }

    public static function priceByProductId($product_id)
    {
       return self::find()
            ->byProductId($product_id)
            ->active()
            ->all();
    }
    public function inactivate()
    {
        $this->status = self::STATUS_INACTIVE;
    }
    #endregion
}
