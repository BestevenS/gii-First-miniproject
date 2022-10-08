<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "customers".
 *
 * @property int $id
 * @property string|null $firstname
 * @property string|null $lastname
 * @property string|null $afm
 * @property string|null $doy
 * @property string|null $address
 * @property string|null $phone
 * @property string|null $at
 * @property string|null $protocol_no
 *
 * @property Billings[] $billings
 * @property Estates[] $estates
 * @property Payments[] $payments
 */
class Customers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['firstname', 'lastname', 'address'], 'string', 'max' => 255],
            [['afm', 'doy'], 'string', 'max' => 20],
            [['phone'], 'string', 'max' => 15],
            [['at'], 'string', 'max' => 10],
            [['protocol_no'], 'string', 'max' => 50],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstname' => 'Firstname',
            'lastname' => 'Lastname',
            'afm' => 'Afm',
            'doy' => 'Doy',
            'address' => 'Address',
            'phone' => 'Phone',
            'at' => 'At',
            'protocol_no' => 'Protocol No',
        ];
    }

    /**
     * Gets query for [[Billings]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillings()
    {
        return $this->hasMany(Billings::class, ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[Estates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstates()
    {
        return $this->hasMany(Estates::class, ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[Payments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPayments()
    {
        return $this->hasMany(Payments::class, ['customer_id' => 'id']);
    }
}
