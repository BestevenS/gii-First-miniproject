<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "earth_type".
 *
 * @property int $id
 * @property int $billing_type_id
 * @property string|null $name
 * @property string $notes
 *
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
            [['billing_type_id', 'notes'], 'required'],
            [['billing_type_id'], 'integer'],
            [['notes'], 'string'],
            [['name'], 'string', 'max' => 255],
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
            'billing_type_id' => 'Billing Type ID',
            'name' => 'Name',
            'notes' => 'Notes',
        ];
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
