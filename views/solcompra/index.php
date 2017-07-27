<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SolcompraSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes de Compra';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solcompra-index">
    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Solcompra', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idSolicitudCom',
            'fechaSolicitud',
            'numCompra',
            'fechaCompra',
            'estado',
            // 'descripcion',
            // 'idUsuario',
            // 'idProveedor',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
