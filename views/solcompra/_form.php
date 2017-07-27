<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Solcompra */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="solcompra-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fechaSolicitud')->textInput() ?>

    <?= $form->field($model, 'numCompra')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fechaCompra')->textInput() ?>

    <?= $form->field($model, 'estado')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idUsuario')->textInput() ?>

    <?= $form->field($model, 'idProveedor')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Registrar' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
