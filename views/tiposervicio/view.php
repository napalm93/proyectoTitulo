<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Tiposervicio */

$this->title = $model->idTipo;
$this->params['breadcrumbs'][] = ['label' => 'Tiposervicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiposervicio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idTipo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idTipo], [
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
            'idTipo',
            'nombreServicio',
            'descripcion',
            'idMantencion',
        ],
    ]) ?>

</div>
