<?php
// This class was automatically generated by a giiant build task
// You should not change it manually as it will be overwritten on next build

namespace common\models\base;

use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;

/**
 * This is the base-model class for table "products".
 *
 * @property integer $id
 * @property string $url
 * @property string $name
 * @property string $image
 * @property string $description
 * @property string $text
 * @property integer $viewed
 * @property integer $status
 * @property integer $is_deleted
 * @property integer $created_at
 * @property integer $updated_at
 * @property integer $created_by
 * @property integer $updated_by
 *
 * @property \common\models\ProductPrice[] $productPrices
 * @property string $aliasModel
 */
abstract class Products extends \yii\db\ActiveRecord
{



    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => TimestampBehavior::className(),
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['text'], 'string'],
            [['viewed', 'status', 'is_deleted'], 'integer'],
            [['url', 'name', 'image', 'description'], 'string', 'max' => 255],
            [['url'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('models', 'ID'),
            'url' => Yii::t('models', 'Url'),
            'name' => Yii::t('models', 'Name'),
            'image' => Yii::t('models', 'Image'),
            'description' => Yii::t('models', 'Description'),
            'text' => Yii::t('models', 'Text'),
            'viewed' => Yii::t('models', 'Viewed'),
            'status' => Yii::t('models', 'Status'),
            'is_deleted' => Yii::t('models', 'Is Deleted'),
            'created_at' => Yii::t('models', 'Created At'),
            'updated_at' => Yii::t('models', 'Updated At'),
            'created_by' => Yii::t('models', 'Created By'),
            'updated_by' => Yii::t('models', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProductPrices()
    {
        return $this->hasMany(\common\models\ProductPrice::className(), ['product_id' => 'id']);
    }


    
    /**
     * @inheritdoc
     * @return \common\models\query\Products the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\Products(get_called_class());
    }


}
