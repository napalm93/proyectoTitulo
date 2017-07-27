<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solmovilizacion */

$this->title = $model->idSolicitudMo;
$this->params['breadcrumbs'][] = ['label' => 'Solmovilizacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solmovilizacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idSolicitudMo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idSolicitudMo], [
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
            'idSolicitudMo',
            'fechaSolicitud',
            'numCentroCosto',
            'numSubCentroCosto',
            'Unidad',
            'nomFuncionario',
            'tipo',
            'fechaSalida',
            'fechaRegreso',
            'horaSalida',
            'horaRegreso',
            'participantes',
            'destino',
            'objetivo',
            'observaciones',
            'idUsuario',
        ],
    ]) ?>

</div>
