<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */

namespace app\models;

use Yii;
use yii\base\model;

class FormSearch extends model{
    public $q;
    
    public function rules()
    {
        return [
            ["q", "match", "pattern" => "/^[0-9a-z������\s]+$/i", "message" => "S�lo se aceptan letras y n�meros"]
        ];
    }
    
    public function attributeLabels()
    {
        return [
            'q' => "Buscar:",
        ];
    }
}

?>