<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Peticionmantencion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="peticionmantencion-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--<?= $form->field($model, 'estado')->HiddenInput(['value'=>0])->label(false) ?>-->

    <!--<?= $form->field($model, 'tipoServicio')->dropDownList(['electrico'=>'Eléctrico', 'cerradura'=>'Cerradura', 'red_de_agua'=>'Red de Agua', 'reparacion'=>'Reparación', 'alcantarillado'=>'Alcantarillado', 'muebles'=>'Muebles', 'equipo'=>'Equipo', 'pintura'=>'Pintura',],['prompt'=>'Seleccionar tipo']) ?>-->

    <!--<?= $form->field($model, 'tipoMantencion')->dropDownList(['preventiva'=>'Preventiva', 'correctiva' => 'Correctiva'],['prompt'=>'Seleccionar tipo']) ?>-->

    <!--<?= $form->field($model, 'descripcionS')->textarea(['rows' => 6]) ?>-->

    <?= $form->field($model, 'descripcionD')->textarea(['rows' => 6, 'value' => $model->descripcionS])->label(false) ?>

    <?= $form->field($model, 'fechaGenerada')->HiddenInput()->label(false) ?>

    <?= $form->field($model, 'fechaAprobada')->HiddenInput()->label(false) ?>

    <!--<?= $form->field($model, 'fechaGestionada')->HiddenInput()->label(false) ?>-->

    <!--<?= $form->field($model, 'fechaEjecutada')->HiddenInput()->label(false) ?>-->

    <?= $form->field($model, 'idUsuario')->HiddenInput()->label(false) ?>

    <div class="modal-footer">
        <?= Html::submitButton('Confirmar', ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>