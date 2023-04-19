<?php

namespace backend\modules\catalog\forms;

use common\models\BrandCategories;
use common\models\ProductAccessory;
use common\models\ProductCategories;
use common\models\ProductPrice;
use common\models\Products;
use common\models\RelPrCt;
use Yii;
use yii\base\Model;

class ProductCreateFrom extends Model
{

    public $name_uz;
    public $name_ru;
    public $text_ru;
    public $text_uz;
    public $viewed;
    public $url;
    public $description_uz;
    public $description_ru;
    public $price;
    public $status;
    public $brand_ct_id;
    public $pr_ct_id;
    public $pr_access_id;
    public $photoFile;

    public $image;


    public function rules()
    {
        return [
            [['name_ru','price','text'], 'required'],
            [['text_uz', 'text_ru'], 'string'],
            [['viewed', 'price', 'pr_access_id', 'pr_ct_id', 'brand_ct_id', 'status'], 'integer'],
            [['pr_access_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductAccessory::class, 'targetAttribute' => ['pr_access_id' => 'id']],
            [['pr_ct_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategories::class, 'targetAttribute' => ['pr_ct_id' => 'id']],
            [['brand_ct_id'], 'exist', 'skipOnError' => true, 'targetClass' => BrandCategories::class, 'targetAttribute' => ['brand_ct_id' => 'id']],
            [['url', 'name_uz', 'nome_ru', 'image', 'description_uz', 'description_ru'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['photoFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png,jpg,jpg,jpeg,jfif'],
        ];
    }

    public function generatePhotoName()
    {
        return 'product_' . Products::getLastId() . '-' . (int)(microtime(true) * (1000)) . '.' . $this->photoFile->extension;
    }

    public function uploadPhoto()
    {
        if ($this->validate(false)) {
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
    public function saveData()
    {
         $productModel = Products::create(
             $this->name_uz,
             $this->name_ru,
             $this->description_uz,
             $this->description_ru,
             $this->text_uz,
             $this->text_ru,
             $this->image,
             $this->status,
         );

        $priceModel = ProductPrice::create(
            $productModel,
            $this->price
        );

         $relPrCtModel = RelPrCt::create(
             $productModel,
             $this->brand_ct_id,
             $this->pr_ct_id,
             $this->pr_access_id
         );

        $transaction = Yii::$app->db->beginTransaction();
        try {
            if (!$productModel->save(false)) {
                throw new \Exception('Произошла ошибка при сохранении данных. ProductPrice');
            }
			if (!$priceModel->save(false)) {
                throw new \Exception('Произошла ошибка при сохранении данных. ProductPrice');
            }
            if (!$relPrCtModel->save(false)) {
                throw new \Exception('Произошла ошибка при сохранении данных. RelPrCt');
            }
            Yii::$app->session->setFlash('success', Yii::t('ui', "Данные созданы успешно"));
            $transaction->commit();
        } catch (\Exception $e) {
            Yii::$app->session->setFlash('error', Yii::t('ui', "Произошла ошибка. Пожалуйста, попробуйте еще раз") . $e->getMessage());
            $transaction->rollBack();
            throw $e;
        }
    }


}