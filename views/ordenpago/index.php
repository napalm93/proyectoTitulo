<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdenpagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ordenes de Pago';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ordenpago-index">
    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ordenpago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idOrden',
            'nombre',
            'rut',
            'valor',
            'centroCosto',
            // 'departamento',
            // 'motivo',
            // 'idUsuario',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
