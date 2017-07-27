<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SecretariaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Secretarias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="secretaria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Secretaria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idUsuario',
            'email:email',
            'contraseña',
            'nomUsuario',
            'idDepartamento',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
