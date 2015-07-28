<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "alumnos".
 *
 * @property integer $id_alumno
 * @property string $nombre
 * @property string $apellidos
 * @property integer $clase
 * @property double $nota_final
 */
class Alumnos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'alumnos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'apellidos', 'clase', 'nota_final'], 'required'],
            [['clase'], 'integer'],
            [['nota_final'], 'number'],
            [['nombre'], 'string', 'max' => 50],
            [['apellidos'], 'string', 'max' => 80]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_alumno' => 'Id Alumno',
            'nombre' => 'Nombre',
            'apellidos' => 'Apellidos',
            'clase' => 'Clase',
            'nota_final' => 'Nota Final',
        ];
    }
}
