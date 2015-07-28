<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "cancion".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $album
 * @property string $artista
 * @property string $letra
 */
class Cancion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cancion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre', 'album', 'artista'], 'string', 'max' => 100],
            [['letra'], 'string', 'max' => 5000]
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
            'album' => 'Album',
            'artista' => 'Artista',
            'letra' => 'Letra',
        ];
    }
}
