<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Solicitante */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solicitante-form">

    <?php $form = ActiveForm::begin([
    'id' => 'solicitante-form',
    'enableAjaxValidation' => true,
    'enableClientScript' => true,
    'enableClientValidation' => true,
    
]); ?>


    <?= $form->field($model, 'nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellido')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numero_identificacion')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model,'fecha_nacimiento')->
    widget(DatePicker::className(),[
        'dateFormat' => 'yyyy-MM-dd',
        'clientOptions' => [
            'yearRange' => '-115:+0',
            'changeYear' => true]
    ]) ?>

    <?= $form->field($model, 'nacionalidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'estado_civil_id')->dropDownList($model->listaEstadoCivil, ['prompt' => 'Seleccione Uno' ]);?>
     
    <?= $form->field($model, 'sexo_id')->dropDownList($model->listaSexo, ['prompt' => 'Seleccione Uno' ]);?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'telefono_movil')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    
    <?php
    $this->registerJs('
        // obtener la id del formulario y establecer el manejador de eventos
            $("form#solicitante-form").on("beforeSubmit", function(e) {
                var form = $(this);
                $.post(
                    form.attr("action")+"&submit=true",
                    form.serialize()
                )
                .done(function(result) {
                    form.parent().html(result.message);
                    $.pjax.reload({container:"#solicitante-grid"});
                });
                return false;
            }).on("submit", function(e){
                e.preventDefault();
                e.stopImmediatePropagation();
                return false;
            });
        ');
    ?>


    
</div>
