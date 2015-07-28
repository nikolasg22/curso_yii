<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "album".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $fecha_lanzamiento
 * @property string $artista
 */
class Album extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'album';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_lanzamiento'], 'safe'],
            [['nombre', 'artista'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'fecha_lanzamiento' => 'Fecha Lanzamiento',
            'artista' => 'Artista',
        ];
    }
}
