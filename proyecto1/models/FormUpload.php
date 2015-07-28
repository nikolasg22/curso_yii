<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */

namespace app\models;

use yii\base\model;
 
class FormUpload extends model{
  
    public $file;
     
    public function rules()
    {
        return [
                    ['file', 'file', 
                   'skipOnEmpty' => false,
                   'uploadRequired' => 'No has seleccionado ning�n archivo', //Error
                   'maxSize' => 1024*1024*1, //1 MB
                   'tooBig' => 'El tama�o m�ximo permitido es 1MB', //Error
                   'minSize' => 10, //10 Bytes
                   'tooSmall' => 'El tama�o m�nimo permitido son 10 BYTES', //Error
                   'extensions' => 'pdf, txt, doc',
                   'wrongExtension' => 'El archivo {file} no contiene una extensi�n permitida {extensions}', //Error
                   'maxFiles' => 4,
                   'tooMany' => 'El m�ximo de archivos permitidos son {limit}', //Error
                   ],
                ]; 
    } 
 
 public function attributeLabels()
 {
  return [
   'file' => 'Seleccionar archivos:',
  ];
 }
}


?>