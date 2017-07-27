<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solcompra */

$this->title = $model->idSolicitudCom;
$this->params['breadcrumbs'][] = ['label' => 'Solcompras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solcompra-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idSolicitudCom], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idSolicitudCom], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idSolicitudCom',
            'fechaSolicitud',
            'numCompra',
            'fechaCompra',
            'estado',
            'descripcion',
            'idUsuario',
            'idProveedor',
        ],
    ]) ?>

</div>
