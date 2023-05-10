<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "client".
 *
 * @property int $id
 * @property string $name
 * @property int $age
 * @property int $id_profile
 * @property int $id_address
 */
class Client extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'client';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'age', 'id_profile', 'id_address'], 'required'],
            [['age', 'id_profile', 'id_address'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['id_profile'], 'unique'],
            [['id_address'], 'unique'],
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
            'age' => 'Age',
            'id_profile' => 'Id Profile',
            'id_address' => 'Id Address',
        ];
    }
}
