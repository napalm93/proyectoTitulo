<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Peticionservicio */

$this->title = 'Update Peticionservicio: ' . $model->idPeticion;
$this->params['breadcrumbs'][] = ['label' => 'Peticionservicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPeticion, 'url' => ['view', 'id' => $model->idPeticion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peticionservicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
