<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "billing_type".
 *
 * @property int $id
 * @property int $area_id
 * @property string|null $name
 * @property string|null $notes
 * @property int $state
 * @property float|null $price
 *
 * @property Areas $area
 * @property Billings[] $billings
 * @property EarthType[] $earthTypes
 * @property Payments[] $payments
 */
class BillingType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'billing_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_id'], 'required'],
            [['area_id', 'state'], 'integer'],
            [['notes'], 'string'],
            [['price'], 'number'],
            [['name'], 'string', 'max' => 255],
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
            'area_id' => 'Area ID',
            'name' => 'Name',
            'notes' => 'Notes',
            'state' => 'State',
            'price' => 'Price',
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
     * Gets query for [[Billings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillings()
    {
        return $this->hasMany(Billings::class, ['billing_type_id' => 'id']);
    }

    /**
     * Gets query for [[EarthTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEarthTypes()
    {
        return $this->hasMany(EarthType::class, ['billing_type_id' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::class, ['billing_type_id' => 'id']);
    }
}
