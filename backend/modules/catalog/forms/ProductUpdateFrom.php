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

class ProductUpdateFrom extends Model
{

    public int $id;
    public $name_uz;
    public $name_ru;
    public $text_ru;
    public $text_uz;
    public $viewed;
    public $description_uz;
    public $description_ru;
    public $price;
    public $url;
    public $status;
    public $brand_ct_id;
    public $pr_ct_id;
    public $pr_access_id;
    public $photoFile;

    public $image;
    private $products;
    public function __construct(Products $products, $config = [])
    {
        $this->products = $products;
        $this->id = $products->id;
        $this->name_uz = $products->name_uz;
        $this->name_ru = $products->name_ru;
        $this->image = $products->image;
        $this->text_uz = $products->text_uz;
        $this->text_ru = $products->text_ru;
        $this->description_uz = $products->description_uz;
        $this->description_ru = $products->description_ru;
        $this->price = $products->getActivePrice();
        $this->url = $products->url;
        $this->status = $products->status;
        $this->brand_ct_id = $products->relPrCt->brandCt->id;
        $this->pr_ct_id = $products->relPrCt->prCt->id;
        $this->pr_access_id = $products->relPrCt->prAccess->id;

        parent::__construct($config);
    }
    public function rules()
    {
        return [
			[['name_ru', 'price','text'], 'required'],
            [['text_uz', 'text_ru'], 'string'],
            [['viewed', 'price', 'pr_access_id', 'pr_ct_id', 'brand_ct_id', 'status'], 'integer'],
            [['pr_access_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductAccessory::class, 'targetAttribute' => ['pr_access_id' => 'id']],
            [['pr_ct_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductCategories::class, 'targetAttribute' => ['pr_ct_id' => 'id']],
            [['brand_ct_id'], 'exist', 'skipOnError' => true, 'targetClass' => BrandCategories::class, 'targetAttribute' => ['brand_ct_id' => 'id']],
            [['url', 'name_uz', 'nome_ru', 'image', 'description_uz', 'description_ru'], 'string', 'max' => 255],
            [['url'], 'unique'],
            [['photoFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png,jpg,jpg,jpeg,jfif'],
        ];
    }

    public function generatePhotoName()
    {
        return 'product_' . $this->products->id . '-' . (int)(microtime(true) * (1000)) . '.' . $this->photoFile->extension;
    }
    public function updatePhoto()
    {
        if ($this->products->isPhotoExists()) {
            $this->products->deletePhoto();
        }
        $this->uploadPhoto();
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
        $this->products->editData(
            $this->name_uz,
            $this->name_ru,
            $this->description_uz,
            $this->description_ru,
            $this->text_uz,
            $this->text_ru,
            $this->image,
            $this->url,
            $this->status
        );

        $relPrCtModel = RelPrCt::relByProductId($this->id);

        $relPrCtModel->editData(
            $this->id,
            $this->brand_ct_id,
            $this->pr_ct_id,
            $this->pr_access_id
        );

        $newPrice = ProductPrice::create(
            $this->products,
            $this->price
        );

        $transaction = Yii::$app->db->beginTransaction();
        try {

            if (!$this->products->update(false)) {
                throw new \Exception('Произошла ошибка при сохранении данных. Products');
            }

            if (!$relPrCtModel->update(false)) {
                throw new \Exception('Произошла ошибка при сохранении данных. RelPrCt');
            }

            if (!$this->products->isCurrentPrice($this->price)){

                $oldPrices = ProductPrice::priceByProductId($this->id);

                foreach ($oldPrices as $oldPrice) {
                    $oldPrice->inactivate();
                    if ($oldPrice->update(false) === false) {
                        throw new \RuntimeException('product price error.');
                    }
                }

                if (!$newPrice->save(false)) {
                    throw new \Exception('Произошла ошибка при сохранении данных.');
                }
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