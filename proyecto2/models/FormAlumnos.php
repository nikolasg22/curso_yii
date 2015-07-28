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
   ['nombre', 'match', 'pattern' => '/^[a-z������\s]+$/i', 'message' => 'S�lo se aceptan letras'],
   ['nombre', 'match', 'pattern' => '/^.{3,50}$/', 'message' => 'M�nimo 3 m�ximo 50 caracteres'],
   ['apellidos', 'required', 'message' => 'Campo requerido'],
   ['apellidos', 'match', 'pattern' => '/^[a-z������\s]+$/i', 'message' => 'S�lo se aceptan letras'],
   ['apellidos', 'match', 'pattern' => '/^.{3,80}$/', 'message' => 'M�nimo 3 m�ximo 80 caracteres'],
   ['clase', 'required', 'message' => 'Campo requerido'],
   ['clase', 'integer', 'message' => 'S�lo n�meros enteros'],
   ['nota_final', 'required', 'message' => 'Campo requerido'],
   ['nota_final', 'number', 'message' => 'S�lo n�meros'],
  ];
 }
 
}

?>