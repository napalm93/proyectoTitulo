<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolmovilizacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solmovilizacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idSolicitudMo') ?>

    <?= $form->field($model, 'fechaSolicitud') ?>

    <?= $form->field($model, 'numCentroCosto') ?>

    <?= $form->field($model, 'numSubCentroCosto') ?>

    <?= $form->field($model, 'Unidad') ?>

    <?php // echo $form->field($model, 'nomFuncionario') ?>

    <?php // echo $form->field($model, 'tipo') ?>

    <?php // echo $form->field($model, 'fechaSalida') ?>

    <?php // echo $form->field($model, 'fechaRegreso') ?>

    <?php // echo $form->field($model, 'horaSalida') ?>

    <?php // echo $form->field($model, 'horaRegreso') ?>

    <?php // echo $form->field($model, 'participantes') ?>

    <?php // echo $form->field($model, 'destino') ?>

    <?php // echo $form->field($model, 'objetivo') ?>

    <?php // echo $form->field($model, 'observaciones') ?>

    <?php // echo $form->field($model, 'idUsuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
