<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solmovilizacion */

$this->title = 'Update Solmovilizacion: ' . $model->idSolicitudMo;
$this->params['breadcrumbs'][] = ['label' => 'Solmovilizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSolicitudMo, 'url' => ['view', 'id' => $model->idSolicitudMo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solmovilizacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
