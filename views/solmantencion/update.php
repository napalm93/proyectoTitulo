<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solmantencion */

$this->title = 'Update Solmantencion: ' . $model->idSolicitudMan;
$this->params['breadcrumbs'][] = ['label' => 'Solmantencions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSolicitudMan, 'url' => ['view', 'id' => $model->idSolicitudMan]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solmantencion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
