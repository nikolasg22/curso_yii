<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "artista".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $foto
 */
class Artista extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'artista';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'string', 'max' => 100],
            [['foto'], 'string', 'max' => 300]
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
            'foto' => 'Foto',
        ];
    }
}
