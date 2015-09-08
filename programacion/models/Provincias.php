<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "provincias".
 *
 * @property integer $provincia_id
 * @property string $codigo_indec
 * @property string $provincia
 */
class Provincias extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'provincias';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo_indec'], 'string', 'max' => 2],
            [['provincia'], 'string', 'max' => 55]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'provincia_id' => 'Provincia ID',
            'codigo_indec' => 'Codigo Indec',
            'provincia' => 'Provincia',
        ];
    }
}
