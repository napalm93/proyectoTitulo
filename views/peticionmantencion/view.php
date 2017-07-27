<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Usuario;

/* @var $this yii\web\View */
/* @var $model app\models\Peticionmantencion */

$this->title = $model->idPeticion;
$this->params['breadcrumbs'][] = ['label' => 'Peticionmantencions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peticionmantencion-view">

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
            //'idPeticion',
            [
                'attribute' => 'Nombre Solicitante',
                'value' => function($model){
                    $usuario = Usuario::findOne($model->idUsuario)->nomUsuario;
                    return $usuario;
                },
            ],
            'estado',
            'descripcionS:ntext',
            'descripcionD:ntext',
            'fechaGenerada',
            'fechaAprobada',
            'fechaGestionada',
            'fechaEjecutada',
            'idUsuario',
        ],
    ]) ?>

</div>
