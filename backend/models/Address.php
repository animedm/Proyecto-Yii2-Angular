<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "address".
 *
 * @property int $id
 * @property string $street
 * @property int $no_apartment
 * @property string $city
 */
class Address extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['street', 'no_apartment', 'city'], 'required'],
            [['no_apartment'], 'integer'],
            [['street'], 'string', 'max' => 512],
            [['city'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'street' => 'Street',
            'no_apartment' => 'No Apartment',
            'city' => 'City',
        ];
    }
}
