<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ordenpago */

$this->title = 'Update Ordenpago: ' . $model->idOrden;
$this->params['breadcrumbs'][] = ['label' => 'Ordenpagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idOrden, 'url' => ['view', 'id' => $model->idOrden]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="ordenpago-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
