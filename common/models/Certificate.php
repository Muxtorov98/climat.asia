<?php

namespace common\models;

use Yii;
use \common\models\base\Certificate as BaseCertificate;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;

/**
 * This is the model class for table "certificate".
 */
class Certificate extends BaseCertificate
{

    const PATH_PHOTO = '/uploads/photos/certificate';

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
                [['photoFile'], 'file', 'maxFiles' => 20, 'skipOnEmpty' => false, 'extensions' => 'png,jpg,jpg,jpeg,jfif,pdf,mdf,'],
                # custom validation rules
            ]
        );
    }
    public static function getLastId()
    {
        $lastId = self::find()->select('id')->sort_desc()->scalar() ?: 0;
        return ++$lastId;
    }

    public static function getPhotoAlias()
    {
        return Yii::getAlias('@appRoot') . self::PATH_PHOTO;
    }

    public function getPhotoSrc()
    {
       return Url::to(self::PATH_PHOTO . '/' . $this->images);
    }

    public function isPhotoExists(): bool
    {
        return file_exists(self::getPhotoAlias() . '/' . $this->images);
    }

    public function deletePhoto(): bool
    {
        return unlink(self::getPhotoAlias() . '/' . $this->images);
    }


    public function generatePhotoName()
    {
        return 'certificate_' . self::getLastId() . '-' . (int)(microtime(true) * (1000)) . '.' . $this->photoFile->extension;
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
        $files = $this->photoFile;
        if ($this->validate()) {
            $path = Certificate::getPhotoAlias();
            if (!file_exists($path)) {
                mkdir($path, 0777, true);
            }
            $this->forEach($files);
            return true;
        } else {
            return false;
        }
    }

    public function forEach($files)
    {
        if ($files){
            foreach ($files as $file) {
                $fileName = $this->generatePhotoName() . $file->extension;
                $file->saveAs(Certificate::getPhotoAlias() . '/' . $fileName);
                $newM = new Certificate;
                $newM->url = randomString();
                $newM->images = $fileName;
                $newM->save(false);
            }
            return true;
        }else{
            return false;
        }
    }


}
