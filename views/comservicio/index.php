<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ComservicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Comisiones de Servicio';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comservicio-index">

    <!--<h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Comservicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idComision',
            'fechaSolicitud',
            'disposicion',
            'tipoFuncionario',
            'nomFuncionario',
            // 'cargo',
            // 'centroCosto',
            // 'sede',
            // 'lugarDestino',
            // 'run',
            // 'grado',
            // 'codigoCC',
            // 'campus',
            // 'fechaIni',
            // 'fechaFin',
            // 'justificacion',
            // 'tipoGasto',
            // 'transporte',
            // 'idUsuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
