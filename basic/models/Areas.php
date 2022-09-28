<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "areas".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $notes
 * @property int $state
 *
 * @property BillingType[] $billingTypes
 * @property EarthType[] $earthTypes
 * @property Estates[] $estates
 */
class Areas extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'areas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['notes'], 'string'],
            [['state'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'notes' => 'Notes',
            'state' => 'State',
        ];
    }

    /**
     * Gets query for [[BillingTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBillingTypes()
    {
        return $this->hasMany(BillingType::class, ['area_id' => 'id']);
    }

    /**
     * Gets query for [[EarthTypes]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEarthTypes()
    {
        return $this->hasMany(EarthType::class, ['area_id' => 'id']);
    }

    /**
     * Gets query for [[Estates]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEstates()
    {
        return $this->hasMany(Estates::class, ['area_id' => 'id']);
    }
}
