<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ComservicioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="comservicio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idComision') ?>

    <?= $form->field($model, 'fechaSolicitud') ?>

    <?= $form->field($model, 'disposicion') ?>

    <?= $form->field($model, 'tipoFuncionario') ?>

    <?= $form->field($model, 'nomFuncionario') ?>

    <?php // echo $form->field($model, 'cargo') ?>

    <?php // echo $form->field($model, 'centroCosto') ?>

    <?php // echo $form->field($model, 'sede') ?>

    <?php // echo $form->field($model, 'lugarDestino') ?>

    <?php // echo $form->field($model, 'run') ?>

    <?php // echo $form->field($model, 'grado') ?>

    <?php // echo $form->field($model, 'codigoCC') ?>

    <?php // echo $form->field($model, 'campus') ?>

    <?php // echo $form->field($model, 'fechaIni') ?>

    <?php // echo $form->field($model, 'fechaFin') ?>

    <?php // echo $form->field($model, 'justificacion') ?>

    <?php // echo $form->field($model, 'tipoGasto') ?>

    <?php // echo $form->field($model, 'transporte') ?>

    <?php // echo $form->field($model, 'idUsuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
