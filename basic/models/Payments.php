<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "payments".
 *
 * @property int $payment_no
 * @property int|null $customer_id
 * @property float|null $price
 * @property int|null $billing_type_id
 * @property string|null $type
 * @property string|null $date
 *
 * @property BillingType $billingType
 * @property Billings[] $billings
 * @property Customers $customer
 */
class Payments extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payments';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'billing_type_id'], 'integer'],
            [['price'], 'number'],
            [['date'], 'safe'],
            [['type'], 'string', 'max' => 20],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['billing_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BillingType::class, 'targetAttribute' => ['billing_type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'payment_no' => 'Payment No',
            'customer_id' => 'Customer ID',
            'price' => 'Price',
            'billing_type_id' => 'Billing Type ID',
            'type' => 'Type',
            'date' => 'Date',
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

    /**
     * Gets query for [[Billings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillings()
    {
        return $this->hasMany(Billings::class, ['payment_id' => 'payment_no']);
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
