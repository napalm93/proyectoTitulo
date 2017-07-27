<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Peticionservicio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peticionservicio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tipoPeticion')->dropDownList(['Mantencion'=>'Mantención'],['prompt'=>'Seleccionar tipo']) ?>

    <?= $form->field($model, 'fechaPeticion')->HiddenInput()->label(false) ?>

    <?= $form->field($model, 'descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'estado')->HiddenInput(['value'=>0])->label(false) ?>

    <?= $form->field($model, 'idUsuario')->HiddenInput()->label(false) ?>

    <div class="form-group">
        <?= Html::submitButton('Enviar Solicitud', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
