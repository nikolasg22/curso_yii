<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "localidades".
 *
 * @property integer $localidad_id
 * @property string $codigo
 * @property string $codigo_departamento
 * @property string $codigo_provincia
 * @property string $localidad
 * @property integer $departamento_id
 */
class Localidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'localidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'codigo_departamento', 'codigo_provincia', 'localidad', 'departamento_id'], 'required'],
            [['departamento_id'], 'integer'],
            [['codigo', 'codigo_departamento'], 'string', 'max' => 10],
            [['codigo_provincia'], 'string', 'max' => 2],
            [['localidad'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'localidad_id' => 'Localidad ID',
            'codigo' => 'Codigo',
            'codigo_departamento' => 'Codigo Departamento',
            'codigo_provincia' => 'Codigo Provincia',
            'localidad' => 'Localidad',
            'departamento_id' => 'Departamento ID',
        ];
    }
}
