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
    public $photoFile;

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
                [['photoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpg,jpeg,jfif'],
                # custom validation rules
            ]
        );
    }

    public static function getLastId()
    {
        $lastId = Products::find()->select('id')
            ->orderBy(['id' => SORT_DESC])
            ->scalar() ?: 0;

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

    public function generatePhotoName()
    {
        return 'product_' . Products::getLastId() . '-' . (int)(microtime(true) * (1000)) . '.' . $this->photoFile->extension;
    }

    public function updatePhoto()
    {
        if ($this->isPhotoExists()) {
            $this->deletePhoto();
        }
        $this->uploadPhoto();
    }

    public function uploadPhoto()
    {
        if ($this->validate()) {
            $path = Products::getPhotoAlias();
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $photoName = $this->generatePhotoName();
            $this->photoFile->saveAs($path . '/' . $photoName);
            $this->image = $photoName;
            return true;
        } else {
            return false;
        }
    }
}
