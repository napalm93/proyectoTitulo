<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PeticionmantencionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peticionmantencion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idPeticion') ?>

    <?= $form->field($model, 'estado') ?>

    <?= $form->field($model, 'descripcionS') ?>

    <?= $form->field($model, 'descripcionD') ?>

    <?= $form->field($model, 'fechaGenerada') ?>

    <?php // echo $form->field($model, 'fechaAprobada') ?>

    <?php // echo $form->field($model, 'fechaGestionada') ?>

    <?php // echo $form->field($model, 'fechaEjecutada') ?>

    <?php // echo $form->field($model, 'idUsuario') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
