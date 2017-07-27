<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Tiposervicio */

$this->title = 'Update Tiposervicio: ' . $model->idTipo;
$this->params['breadcrumbs'][] = ['label' => 'Tiposervicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipo, 'url' => ['view', 'id' => $model->idTipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tiposervicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
