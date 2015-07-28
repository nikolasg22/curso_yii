<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */

namespace app\models;
use Yii;
use yii\base\model;

class FormAlumnos extends model{

public $id_alumno;
public $nombre;
public $apellidos;
public $clase;
public $nota_final;

public function rules()
 {
  return [
   ['id_alumno', 'integer', 'message' => 'Id incorrecto'],
   ['nombre', 'required', 'message' => 'Campo requerido'],
   ['nombre', 'match', 'pattern' => '/^[a-zαινσϊρ\s]+$/i', 'message' => 'Sσlo se aceptan letras'],
   ['nombre', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'Mνnimo 3 mαximo 50 caracteres'],
   ['apellidos', 'required', 'message' => 'Campo requerido'],
   ['apellidos', 'match', 'pattern' => '/^[a-zαινσϊρ\s]+$/i', 'message' => 'Sσlo se aceptan letras'],
   ['apellidos', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'Mνnimo 3 mαximo 80 caracteres'],
   ['clase', 'required', 'message' => 'Campo requerido'],
   ['clase', 'integer', 'message' => 'Sσlo nϊmeros enteros'],
   ['nota_final', 'required', 'message' => 'Campo requerido'],
   ['nota_final', 'number', 'message' => 'Sσlo nϊmeros'],
  ];
 }
 
}

?>