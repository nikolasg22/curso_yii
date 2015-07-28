<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */

namespace app\models;

use Yii;

class Calendar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'calendar';
    }
 
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['date', 'val'], 'required'],
        ];
    }
 
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date' => 'Date',
            'val' => 'Val',
        ];
    }
}

?>