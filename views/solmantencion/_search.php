<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SolmantencionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solmantencion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idSolicitudMan') ?>

    <?= $form->field($model, 'numero') ?>

    <?= $form->field($model, 'fechaSolicitud') ?>

    <?= $form->field($model, 'reparticion') ?>

    <?= $form->field($model, 'centroCosto') ?>

    <?php // echo $form->field($model, 'nomSolicitante') ?>

    <?php // echo $form->field($model, 'ubicacionServicio') ?>

    <?php // echo $form->field($model, 'anexo') ?>

    <?php // echo $form->field($model, 'tipoServicio') ?>

    <?php // echo $form->field($model, 'descripcion') ?>

    <?php // echo $form->field($model, 'prioridad') ?>

    <?php // echo $form->field($model, 'tipoMantencion') ?>

    <?php // echo $form->field($model, 'idPeticion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
