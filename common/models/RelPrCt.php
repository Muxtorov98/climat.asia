<?php

namespace common\models;

use Yii;
use \common\models\base\RelPrCt as BaseRelPrCt;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "rel_pr_ct".
 */
class RelPrCt extends BaseRelPrCt
{

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

    public static function relByProductId($product_id)
    {
      return self::find()->byProductId($product_id)->one();
    }

    #region iSOLID
    public static function create(
        Products $products,
        $brand_ct_id,
        $pr_ct_id,
        $pr_access_id
    )
    {
        $newModel = new RelPrCt;
        $newModel->brand_ct_id = $brand_ct_id;
        $newModel->pr_ct_id = $pr_ct_id;
        $newModel->pr_access_id = $pr_access_id;
        $newModel->populateRelation('products', $products);
        return $newModel;
    }

    public function editData(
        $product_id,
        $brand_ct_id,
        $pr_ct_id,
        $pr_access_id
    )
    {
        $this->brand_ct_id = $brand_ct_id;
        $this->pr_ct_id = $pr_ct_id;
        $this->pr_access_id = $pr_access_id;
        $this->product_id = $product_id;

    }
    #endregion
}
