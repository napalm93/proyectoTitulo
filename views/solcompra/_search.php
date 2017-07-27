<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolcompraSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solcompra-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idSolicitudCom') ?>

    <?= $form->field($model, 'fechaSolicitud') ?>

    <?= $form->field($model, 'numCompra') ?>

    <?= $form->field($model, 'fechaCompra') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'idUsuario') ?>

    <?php // echo $form->field($model, 'idProveedor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
