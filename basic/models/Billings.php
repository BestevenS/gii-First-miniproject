<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "billings".
 *
 * @property int $id
 * @property int|null $customer_id
 * @property int|null $billing_type_id
 * @property int|null $payment_id
 * @property int|null $paid
 *
 * @property BillingType $billingType
 * @property Customers $customer
 * @property Payments $payment
 */
class Billings extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'billings';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'billing_type_id', 'payment_id', 'paid'], 'integer'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customers::class, 'targetAttribute' => ['customer_id' => 'id']],
            [['billing_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BillingType::class, 'targetAttribute' => ['billing_type_id' => 'id']],
            [['payment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Payments::class, 'targetAttribute' => ['payment_id' => 'payment_no']],
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
            'billing_type_id' => 'Billing Type ID',
            'payment_id' => 'Payment ID',
            'paid' => 'Paid',
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
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customers::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[Payment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayment()
    {
        return $this->hasOne(Payments::class, ['payment_no' => 'payment_id']);
    }
}
