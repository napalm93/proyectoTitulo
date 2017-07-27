<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Comservicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comservicio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fechaSolicitud')->textInput() ?>

    <?= $form->field($model, 'disposicion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoFuncionario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomFuncionario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'centroCosto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sede')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'lugarDestino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'run')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'grado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'codigoCC')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'campus')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaIni')->textInput() ?>

    <?= $form->field($model, 'fechaFin')->textInput() ?>

    <?= $form->field($model, 'justificacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipoGasto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'transporte')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUsuario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
