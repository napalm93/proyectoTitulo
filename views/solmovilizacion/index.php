<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolmovilizacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes de Movilización';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solmovilizacion-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solmovilizacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idSolicitudMo',
            'fechaSolicitud',
            'numCentroCosto',
            'numSubCentroCosto',
            'Unidad',
            // 'nomFuncionario',
            // 'tipo',
            // 'fechaSalida',
            // 'fechaRegreso',
            // 'horaSalida',
            // 'horaRegreso',
            // 'participantes',
            // 'destino',
            // 'objetivo',
            // 'observaciones',
            // 'idUsuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
