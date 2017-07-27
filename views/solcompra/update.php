<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Solcompra */

$this->title = 'Update Solcompra: ' . $model->idSolicitudCom;
$this->params['breadcrumbs'][] = ['label' => 'Solcompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idSolicitudCom, 'url' => ['view', 'id' => $model->idSolicitudCom]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="solcompra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
