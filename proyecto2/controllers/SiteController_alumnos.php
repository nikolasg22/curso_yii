<?php

/**
 * @author Niko Gasco
 * @copyright 2015
 */

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\ValidarFormulario;
use app\models\ValidarFormularioAjax;
use yii\widgets\ActiveForm;
use yii\web\Response;
use app\models\FormAlumnos;
use app\models\FormSearch;
use app\models\Alumnos;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\helpers\Url;

class SiteController extends Controller
{    
    
        public function actionUpdate()
        {
            $model = new FormAlumnos;
            $msg = null;
            
            if($model->load(Yii::$app->request->post()))
            {
                if($model->validate())
                {
                    $table = Alumnos::findOne($model->id_alumno);
                    if($table)
                    {
                        $table->nombre = $model->nombre;
                        $table->apellidos = $model->apellidos;
                        $table->clase = $model->clase;
                        $table->nota_final = $model->nota_final;
                        if ($table->update())
                        {
                            $msg = "El Alumno ha sido actualizado correctamente";
                        }
                        else
                        {
                            $msg = "El Alumno no ha podido ser actualizado";
                        }
                    }
                    else
                    {
                        $msg = "El alumno seleccionado no ha sido encontrado";
                    }
                }
                else
                {
                    $model->getErrors();
                }
            }
            
            
            if (Yii::$app->request->get("id_alumno"))
            {
                $id_alumno = Html::encode($_GET["id_alumno"]);
                if ((int) $id_alumno)
                {
                    $table = Alumnos::findOne($id_alumno);
                    if($table)
                    {
                        $model->id_alumno = $table->id_alumno;
                        $model->nombre = $table->nombre;
                        $model->apellidos = $table->apellidos;
                        $model->clase = $table->clase;
                        $model->nota_final = $table->nota_final;
                    }
                    else
                    {
                        return $this->redirect(["site/view"]);
                    }
                }
                else
                {
                    return $this->redirect(["site/view"]);
                }
            }
            else
            {
                return $this->redirect(["site/view"]);
            }
            return $this->render("update", ["model" => $model, "msg" => $msg]);
        }
        
    public function actionDelete()
    {
        if(Yii::$app->request->post())
        {
            $id_alumno = Html::encode($_POST["id_alumno"]);
            if((int) $id_alumno)
            {
                if(Alumnos::deleteAll("id_alumno=:id_alumno", [":id_alumno" => $id_alumno]))
                {
                    echo "Alumno con id $id_alumno eliminado con �xito, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>";
                }
                else
                {
                    echo "Ha ocurrido un error al eliminar el alumno, redireccionando ...";
                    echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>"; 
                }
            }
            else
            {
                echo "Ha ocurrido un error al eliminar el alumno, redireccionando ...";
                echo "<meta http-equiv='refresh' content='3; ".Url::toRoute("site/view")."'>";
            }
        }
        else
        {
            return $this->redirect(["site/view"]);
        }
    }
     
    
    public function actionView()
    {
        $form = new FormSearch;
        $search = null;
        if($form->load(Yii::$app->request->get()))
        {
            if ($form->validate())
            {
                $search = Html::encode($form->q);
                $table = Alumnos::find()
                        ->where(["like", "id_alumno", $search])
                        ->orWhere(["like", "nombre", $search])
                        ->orWhere(["like", "apellidos", $search]);
                $count = clone $table;
                $pages = new Pagination([
                    "pageSize" => 1,
                    "totalCount" => $count->count()
                ]);
                $model = $table
                        ->offset($pages->offset)
                        ->limit($pages->limit)
                        ->all();
            }
            else
            {
                $form->getErrors();
            }
        }
        else
        {
            $table = Alumnos::find();
            $count = clone $table;
            $pages = new Pagination([
                "pageSize" => 1,
                "totalCount" => $count->count(),
            ]);
            $model = $table
                    ->offset($pages->offset)
                    ->limit($pages->limit)
                    ->all();
        }
        return $this->render("view", ["model" => $model, "form" => $form, "search" => $search, "pages" => $pages]);
    }
    public function actionCreate()
    {
        $model = new FormAlumnos;
        $msg = null;
        if($model->load(Yii::$app->request->post()))
        {
            if($model->validate())
            {
                $table = new Alumnos;
                $table->nombre = $model->nombre;
                $table->apellidos = $model->apellidos;
                $table->clase = $model->clase;
                $table->nota_final = $model->nota_final;
                if ($table->insert())
                {
                    $msg = "Enhorabuena registro guardado correctamente";
                    $model->nombre = null;
                    $model->apellidos = null;
                    $model->clase = null;
                    $model->nota_final = null;
                }
                else
                {
                    $msg = "Ha ocurrido un error al insertar el registro";
                }
            }
            else
            {
                $model->getErrors();
            }
        }
        return $this->render("create", ['model' => $model, 'msg' => $msg]);
    }
    
    /*
    public function actionSaluda($get = "Tutorial Yii")
    {
        $mensaje = "Hola Mundo";  
        $numeros = [0, 1, 2, 3, 4, 5];
        return $this->render("saluda", 
                [
                    "saluda" => $mensaje,
                    "numeros" => $numeros,
                    "get" => $get,
                ]);
    }
    
    
    public function actionFormulario($mensaje = null)
    {
        return $this->render("formulario", ["mensaje" => $mensaje]);
    }
    
    public function actionRequest()
    {
        $mensaje = null;
        if (isset($_REQUEST["nombre"]))
        {
            $mensaje = "Bien, has enviando tu nombre correctamente: " . $_REQUEST["nombre"];
        }
        $this->redirect(["site/formulario", "mensaje" => $mensaje]);
    }
    
    
    public function actionValidarformulario()
    {

      $model = new ValidarFormulario;
      
      if ($model->load(Yii::$app->request->post()))
      {
          if($model->validate())
                {
                    //Por ejemplo, consultar en una base de datos
                }
                else
                {
                    $model->getErrors();
                }
      }
      
            return $this->render("validarformulario", ["model" => $model]);
    }
    
    
    public function actionValidarformularioajax()
    {
        $model = new ValidarFormularioAjax;
        $msg = null;
        
        if ($model->load(Yii::$app->request->post()) && Yii::$app->request->isAjax)
        {
            Yii::$app->response->format = Response::FORMAT_JSON;
            return ActiveForm::validate($model);
        }
        
        if ($model->load(Yii::$app->request->post()))
        {
            if ($model->validate())
            {
                //Por ejemplo hacer una consulta a una base de datos
                $msg = "Enhorabuena formulario enviado correctamente";
                $model->nombre = null;
                $model->email = null;
            }
            else
            {
                $model->getErrors();
            }
        }
        
        return $this->render("validarformularioajax", ['model' => $model, 'msg' => $msg]);
    }
    */
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    public function actionAbout()
    {
        return $this->render('about');
    }
}


?>