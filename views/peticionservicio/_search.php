<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeticionservicioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peticionservicio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPeticion') ?>

    <?= $form->field($model, 'tipoPeticion') ?>

    <?= $form->field($model, 'fechaPeticion') ?>

    <?= $form->field($model, 'descripcion') ?>

    <?= $form->field($model, 'estado') ?>

    <?php // echo $form->field($model, 'idUsuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
