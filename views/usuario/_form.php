<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Departamento;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nomUsuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rut')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'rol')->dropDownList(['1'=>'Administrador', '2'=> 'Secretaria', '3'=>'Funcionario', '4'=>'Jefe de Departamento' ], ['prompt'=>'Seleccionar rol']) ?>

    <?= $form->field($model, 'telefono')->textInput() ?>

    <?= $form->field($model, 'idDepartamento')->dropDownList(
        ArrayHelper::map( Departamento::find()->all(), 'idDepartamento', 'nomDepartamento'),
        [
            'prompt'=>'Seleccionar departamento',

        
        ]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
