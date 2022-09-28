<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "estates".
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $type
 * @property float|null $size
 * @property int|null $area_id
 * @property string|null $notes
 *
 * @property Areas $area
 * @property Customers $customer
 */
class Estates extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'estates';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'area_id'], 'integer'],
            [['size'], 'number'],
            [['notes'], 'string'],
            [['type'], 'string', 'max' => 50],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Areas::class, 'targetAttribute' => ['area_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'type' => 'Type',
            'size' => 'Size',
            'area_id' => 'Area ID',
            'notes' => 'Notes',
        ];
    }

    /**
     * Gets query for [[Area]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getArea()
    {
        return $this->hasOne(Areas::class, ['id' => 'area_id']);
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::class, ['id' => 'customer_id']);
    }
}
