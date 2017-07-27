<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Secretaria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="secretaria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contraseña')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nomUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'idDepartamento')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
