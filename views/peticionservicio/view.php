<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Peticionservicio */

$this->title = $model->idPeticion;
$this->params['breadcrumbs'][] = ['label' => 'Peticionservicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peticionservicio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idPeticion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idPeticion], [
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
            'idPeticion',
            'tipoPeticion',
            'fechaPeticion',
            'descripcion:ntext',
            'estado',
            'idUsuario',
        ],
    ]) ?>

</div>
