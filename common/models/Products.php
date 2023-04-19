<?php

namespace common\models;

use common\components\localization\Lang;
use Yii;
use \common\models\base\Products as BaseProducts;
use yii\helpers\ArrayHelper;
use yii\helpers\StringHelper;
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

    public function getText()
    {
        return $this['text_'.lange_code()];
    }
    public function getShortDescription($count)
    {
        return StringHelper::truncateWords(strip_tags($this['description_'.lange_code()]), $count);
    }

    public function getShortTex($count)
    {
        return StringHelper::truncateWords(strip_tags($this['text_'.lange_code()]), $count);
    }

    #region iSOLID
    public static function create(
        $name_uz,
        $name_ru,
        $description_uz,
        $description_ru,
        $text_uz,
        $text_ru,
        $image,
        $status
    )
    {
        $newModel = new Products;
        $newModel->name_uz = $name_uz;
        $newModel->name_ru = $name_ru;
        $newModel->description_uz = $description_uz;
        $newModel->description_ru = $description_ru;
        $newModel->text_uz = $text_uz;
        $newModel->text_ru = $text_ru;
        $newModel->image = $image;
        $newModel->url = randomString();
        $newModel->status = $status;
        return $newModel;
    }

    public function editData(
        $name_uz,
        $name_ru,
        $description_uz,
        $description_ru,
        $text_uz,
        $text_ru,
        $image,
        $url,
        $status
    )
    {
        $this->name_uz = $name_uz;
        $this->name_ru = $name_ru;
        $this->description_uz = $description_uz;
        $this->description_ru = $description_ru;
        $this->text_uz = $text_uz;
        $this->text_ru = $text_ru;
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
