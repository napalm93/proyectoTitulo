<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Ordenpago */

$this->title = $model->idOrden;
$this->params['breadcrumbs'][] = ['label' => 'Ordenpagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordenpago-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idOrden], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idOrden], [
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
            'idOrden',
            'nombre',
            'rut',
            'valor',
            'centroCosto',
            'departamento',
            'motivo',
            'idUsuario',
        ],
    ]) ?>

</div>
