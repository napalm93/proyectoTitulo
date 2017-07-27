<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Comservicio */

$this->title = 'Update Comservicio: ' . $model->idComision;
$this->params['breadcrumbs'][] = ['label' => 'Comservicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idComision, 'url' => ['view', 'id' => $model->idComision]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="comservicio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
