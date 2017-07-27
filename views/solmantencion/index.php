<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolmantencionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solmantencions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solmantencion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solmantencion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idSolicitudMan',
            'numero',
            'fechaSolicitud',
            'reparticion',
            'centroCosto',
            // 'nomSolicitante',
            // 'ubicacionServicio',
            // 'anexo',
            // 'tipoServicio',
            // 'descripcion:ntext',
            // 'prioridad',
            // 'tipoMantencion',
            // 'idPeticion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
