<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "earth_type".
 *
 * @property int $id
 * @property int $area_id
 * @property int $billing_type_id
 * @property string|null $name
 * @property string $notes
 * @property string|null $billing_type
 *
 * @property Areas $area
 * @property BillingType $billingType
 */
class EarthType extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'earth_type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['area_id', 'billing_type_id', 'notes'], 'required'],
            [['area_id', 'billing_type_id'], 'integer'],
            [['notes'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['billing_type'], 'string', 'max' => 50],
            [['area_id'], 'exist', 'skipOnError' => true, 'targetClass' => Areas::class, 'targetAttribute' => ['area_id' => 'id']],
            [['billing_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BillingType::class, 'targetAttribute' => ['billing_type_id' => 'id']],
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
            'billing_type_id' => 'Billing Type ID',
            'name' => 'Name',
            'notes' => 'Notes',
            'billing_type' => 'Billing Type',
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
     * Gets query for [[BillingType]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillingType()
    {
        return $this->hasOne(BillingType::class, ['id' => 'billing_type_id']);
    }
}
