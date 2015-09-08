<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "departamentos".
 *
 * @property integer $departamento_id
 * @property string $codigo
 * @property string $codigo_provincia
 * @property string $departamento
 * @property integer $provincia_id
 */
class Departamentos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'departamentos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codigo_provincia', 'departamento', 'provincia_id'], 'required'],
            [['provincia_id'], 'integer'],
            [['codigo'], 'string', 'max' => 10],
            [['codigo_provincia'], 'string', 'max' => 2],
            [['departamento'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'departamento_id' => 'Departamento ID',
            'codigo' => 'Codigo',
            'codigo_provincia' => 'Codigo Provincia',
            'departamento' => 'Departamento',
            'provincia_id' => 'Provincia ID',
        ];
    }
}
