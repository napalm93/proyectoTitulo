<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeticionservicioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Petición de Servicios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peticionservicio-index">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <!-- <p>
        <?= Html::a('Create Peticionservicio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idPeticion',
            'tipoPeticion',
            'fechaPeticion',
            'descripcion:ntext',
            [
            'attribute'=> 'estado',
            'value' => function ($model){
                if ($model->estado==0) {
                    return 'Pendiente';
                }elseif ($model->estado==1) {
                    return 'Aceptada';
                }elseif ($model->estado==2) {
                    return 'Rechazada';
                }
            },
            // 'idUsuario',
            ],
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{aceptar} {rechazar}',
                'buttons' => [
                    'aceptar' => function ($url,$model) {
                        return Html::a(
                         '<button type="button" class="btn btn-success" aria-label="Left Align">
                            <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                          </button>',
                        ['view','id'=>$model->idPeticion], 
                        [
                            'title' => 'Aceptar Peticion',
                            'data-pjax' => '0',
                        ]
                        );
                    },
                    'rechazar' => function ($url,$model) {
                        return Html::a(
                         '<button type="button" class="btn btn-danger" aria-label="right Align">
                            <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                          </button>',
                        ['view','id'=>$model->idPeticion], 
                        [
                            'title' => 'Aceptar Peticion',
                            'data-pjax' => '0',
                        ]
                        );
                    },                    
                ],


            ],


        ],
    ]); ?>
</div>
