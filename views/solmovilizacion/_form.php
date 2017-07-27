<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Solmovilizacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solmovilizacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fechaSolicitud')->textInput() ?>

    <?= $form->field($model, 'numCentroCosto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'numSubCentroCosto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Unidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomFuncionario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tipo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaSalida')->textInput() ?>

    <?= $form->field($model, 'fechaRegreso')->textInput() ?>

    <?= $form->field($model, 'horaSalida')->textInput() ?>

    <?= $form->field($model, 'horaRegreso')->textInput() ?>

    <?= $form->field($model, 'participantes')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'destino')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'objetivo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'observaciones')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUsuario')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
