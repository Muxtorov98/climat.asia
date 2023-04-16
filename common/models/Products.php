<?php

namespace common\models;

use Yii;
use \common\models\base\Products as BaseProducts;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "products".
 */
class Products extends BaseProducts
{

    const PATH_PHOTO = '/uploads/photos/product';
    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = 0;


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

    public static function getLastId()
    {
        $lastId = Products::find()->select('id')->sort_desc()->scalar() ?: 0;
        return ++$lastId;
    }


    public static function getPhotoAlias()
    {
        return Yii::getAlias('@appRoot') . self::PATH_PHOTO;
    }

    public function getPhotoSrc()
    {
        return Url::to(self::PATH_PHOTO . '/' . $this->image);
    }

    public function isPhotoExists(): bool
    {
        return file_exists(self::getPhotoAlias() . '/' . $this->image);
    }

    public function deletePhoto(): bool
    {
        return unlink(self::getPhotoAlias() . '/' . $this->image);
    }

    #region iSOLID
    public static function create($name, $description, $text, $image, $status)
    {
        $newModel = new Products;
        $newModel->name = $name;
        $newModel->description = $description;
        $newModel->text = $text;
        $newModel->image = $image;
        $newModel->url = randomString();
        $newModel->status = $status;
        return $newModel;
    }

    public function editData($name, $description, $text, $image, $url, $status)
    {
        $this->name = $name;
        $this->description = $description;
        $this->text = $text;
        $this->image = $image;
        $this->url = $url;
        $this->status = $status;
    }
    #endregion

    #region Checkers
    public function isCurrentPrice($price)
    {
        return $this->getActivePrice() === $price;
    }
    #endregion

    #region Getter
    public function getActivePrice()
    {
        return $this->getProductPrices()->select('price')->active()->scalar();
    }
    #endregion
}
