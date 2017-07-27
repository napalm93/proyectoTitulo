<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Peticionmantencion */

$this->title = 'Update Peticionmantencion: ' . $model->idPeticion;
$this->params['breadcrumbs'][] = ['label' => 'Peticionmantencions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idPeticion, 'url' => ['view', 'id' => $model->idPeticion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peticionmantencion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
