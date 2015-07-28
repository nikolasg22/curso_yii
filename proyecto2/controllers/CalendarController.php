<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */


namespace app\controllers;

use yii\web\Controller;
use app\models\CalendarSearch;


class CalendarController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new CalendarSearch;
        $dataProvider = $searchModel->search(Yii::$app->request->getQueryParams());
 
        return $this->render('index', [
                'dataProvider' => $dataProvider
            ]);
    }
}

?>