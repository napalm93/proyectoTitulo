<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TiposervicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tiposervicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tiposervicio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Tiposervicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idTipo',
            'nombreServicio',
            'descripcion',
            'idMantencion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
