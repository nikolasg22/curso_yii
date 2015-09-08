<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */

namespace app\controllers;

use yii\web\Controller;
use app\models\HtmlHelpers;
use app\models\Departamentos;
use app\models\Localidades;

class DependentDropdownController extends Controller
{
	public function actionIndex()
	{
		$this->render('index');
	}

    public function actionDepartamento($id){
        echo HtmlHelpers::dropDownList(Departamentos::className(), 'provincia_id', $id, 'departamento_id', 'departamento');
    }

    public function actionLocalidad($id){
        echo HtmlHelpers::dropDownList(Localidades::className(), 'departamento_id', $id, 'localidad_id', 'localidad');
    }
}

?>