<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use app\models\Provincias;
use app\models\Departamentos;
use app\models\Localidades;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dni')->textInput() ?>

    <?php echo $form->field($model,'fecha_nacimiento')->
    widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]
    ]) ?>

    <?= $form->field($model, 'domicilio')->textInput(['maxlength' => true]) ?>

    <?php
        $provincia = ArrayHelper::map(Provincias::find()->all(), 'provincia_id', 'provincia');
        echo $form->field($model, 'provincia_id')->dropDownList(
            $provincia,
            [
                'prompt'=>'Por favor elija una',
                'onchange'=>'
                                $.get( "'.Url::toRoute('dependent-dropdown/departamento').'", { id: $(this).val() } )
                                    .done(function( data ) {
                                        $( "#'.Html::getInputId($model, 'departamento_id').'" ).html( data );
                                    }
                                );
                            '
            ]
        );
    ?>
         
    <?php echo $form->field($model, 'departamento_id')->dropDownList(array(),
            [
                'prompt'=>'Por favor elija uno',
                'onchange'=>'
                                $.get( "'.Url::toRoute('dependent-dropdown/localidad').'", { id: $(this).val() } )
                                    .done(function( data ) {
                                        $( "#'.Html::getInputId($model, 'localidad_id').'" ).html( data );
                                    }
                                );
                            '
            ]
        ); 
    ?>
         
    <?php
        if ($model->isNewRecord)
            echo $form->field($model, 'localidad_id')->dropDownList(['prompt'=>'Por favor elija una']);
        else
        {
            $localidad = ArrayHelper::map(Localidades::find()->where(['localidad_id' => $model->localidad_id])->all(), 'localidad_id', 'localidad');
            echo $form->field($model, 'localidad_id')->dropDownList($localidad);
        }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
