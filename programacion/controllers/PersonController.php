<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */

namespace app\controllers;

use sjaakp\alphapager\ActiveDataProvider; 

class PersonController extends Controller 
{    
    
    public function actionIndex()
    {
        { $dataProvider = new ActiveDataProvider
        ([ 'query' => Person::find()->orderBy('last_name, first_name'), 'alphaAttribute' => 'last_name' ]);
         return $this->render('index', [ 'dataProvider' => $dataProvider ]); } // ... more actions ... }
        
     
    }
}    

?>