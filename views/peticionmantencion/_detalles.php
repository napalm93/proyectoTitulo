<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeticionmantencionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

//$this->title = 'Ordenes de Pago';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peticionmantencion-index">
    <!--
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ordenpago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->


    <?php
        $rolUsuario = Yii::$app->user->identity->rol;
        $registrarSolicitud = function ($url,$model) {
                            $peticion = $model->idPeticion;
                                if($model->estado == 1){
                                return Html::button('Registrar <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>', ['value' => Url::to('index.php?r=peticionmantencion/registrar&id='.$peticion), 
                                    'class' => 'finalizar btn btn-primary']);


                                }elseif ($model->estado == 0 || $model->estado == 2 || $model->estado == 3 || $model->estado == 4) {
                                return Html::a(
                                '<button type="button" class="btn btn-primary" aria-label="Left Align" disabled>
                                    Registrar <span class="glyphicon glyphicon-edit" aria-hidden="true"></span>
                                </button>');
                                }
                            };
        $ejecutada = function ($url,$model) {
                            $peticion = $model->idPeticion;
                                if($model->estado == 3){
                                return Html::button('Finalizar <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>', ['value' => Url::to('index.php?r=peticionmantencion/ejecutada&id='.$peticion), 'class' => 'finalizar btn btn-info']);

                                }elseif ($model->estado == 0 || $model->estado == 1 || $model->estado == 2 || $model->estado == 4) {
                                return Html::a(
                                '<button type="button" class="btn btn-info" aria-label="Left Align" disabled>
                                    Finalizar <span class="glyphicon glyphicon-ok-circle" aria-hidden="true"></span>
                                </button>');
                                }
                            };
        $verSolicitud = function ($url,$model) {
                            $peticion = $model->idPeticion;
                                if($model->estado == 3 || $model->estado == 4){
                                return Html::a('<button type="button" class="btn btn-info" aria-label="Left Align">
                                Ver Solicitud <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                            </button>',
                            ['/solmantencion/viewsolicitud','id'=>$model->idPeticion] 
                            /*[
                                'title' => 'Ver Peticion',
                                'data-pjax' => '0',
                            ]*/);

                                }elseif ($model->estado == 0 || $model->estado == 1 || $model->estado == 2) {
                                return Html::a(
                                '<button type="button" class="btn btn-info" aria-label="Left Align" disabled>
                                    Ver Solicitud <span class="glyphicon glyphicon-search" aria-hidden="true"></span>
                                </button>');
                                }
                            };
        $botonAceptar = function ($url,$model) {
                            $peticion = $model->idPeticion;
                            if($model->estado == 0 || $model->estado ==2){
                                return Html::button('Aprobar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>', ['value' => Url::to('index.php?r=peticionmantencion/aprobar&id='.$peticion), 'class' => 'aprobar btn btn-success']);
                            /*
                            '<button type="button" id="aprueba" class="btn btn-success" aria-label="Left Align">
                                Aprobar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                            </button>',
                            ['aprobar','id'=>$model->idPeticion], 
                            [
                                'title' => 'Aprobar Peticion',
                                'data-pjax' => '0',
                            ]
                            */
                        
                            }elseif ($model->estado == 1 || $model->estado == 3 || $model->estado == 4) {
                                return Html::a(
                                '<button type="button" id="aceptar" class="btn btn-success" aria-label="Left Align" disabled>
                                    Aprobar <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                                </button>');
                            }

                        };
        $botonRechazar = function ($url,$model) {
                            $peticion = $model->idPeticion;
                            if($model->estado == 0){
                            return Html::button('Rechazar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>', ['value' => 'index.php?r=peticionmantencion/rechazar&id='.$peticion, 'class' => 'rechazar btn btn-danger']);
                            /*
                            Html::a(
                            '<button type="button" id="rechazar" class="btn btn-danger" aria-label="right Align">
                                Rechazar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </button>',
                            ['rechazar','id'=>$model->idPeticion], 
                            [
                                'title' => 'Rechazar Peticion',
                                'data-pjax' => '0',
                            ]
                            );
                            */
                            }elseif ($model->estado == 1 || $model->estado == 3 || $model->estado == 4 || $model->estado ==2) {
                                return Html::a(
                                '<button type="button" id="rechazar" class="btn btn-danger" aria-label="Left Align" disabled>
                                    Rechazar <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                                </button>');
                            }
                        };


        switch ($rolUsuario) {
            case '4':                       //Tabla para Jefe Departamento

            echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'summary' => '',
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'Descripcion',
                    'value' => 'descripcionS',
                    'header' => '<h5>Descripción</h5>',
                    'headerOptions' => ['style' => 'width:80%'],
                //'descripcionD:ntext',
                ],
                /*
                [
                    'attribute' => 'Descripcion',
                    'value' => 'descripcionD',
                    'header' => 'Descripción Director',
                    'headerOptions' => ['style' => 'width:40%'],
                //'descripcionD:ntext',
                ],
                */
                [
                    //'header' => 'Acciones',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{aceptar}',

                    'buttons' => [
                        'aceptar' => $botonAceptar,
                                            
                    ],
                ],
                [
                    //'header' => 'Acciones',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{rechazar}',

                    'buttons' => [
                        
                        'rechazar' => $botonRechazar,                    
                    ],
                ],

            //['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
                break;
            
            case '3':                   //Tabla para Funcionario

            echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'summary' => '',
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'descripcionS',
                    'header' => '<h5>Descripción</h5>',
                    'headerOptions' => ['style' => 'width:80%'],
                //'descripcionD:ntext',

                ],
            ],
        ]);
                break;

        case '2':                       //Tabla para Secretaria
            echo GridView::widget([
            'dataProvider' => $dataProvider,
            //'filterModel' => $searchModel,
            'summary' => '',
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],
                [
                    'attribute' => 'Descripcion',
                    'value' => 'descripcionS',
                    'header' => '<h5>Descripción</h5>',
                    'headerOptions' => ['style' => 'width:79%'],
                //'descripcionD:ntext',
                ],
                /*
                [
                    'attribute' => 'Descripcion',
                    'value' => 'descripcionD',
                    'header' => 'Descripción Director',
                    'headerOptions' => ['style' => 'width:40%'],
                //'descripcionD:ntext',
                ],
                */
                [
                    //'header' => 'Registrar',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{registrar}',

                    'buttons' => [
                        'registrar' => $registrarSolicitud,
                                          
                    ],
                ],
                [
                    //'header' => 'Marcar Ejecutada',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{ejecutada}',

                    'buttons' => [
                      
                        'ejecutada' => $ejecutada,                    
                    ],
                ],
                [
                    //'header' => 'Marcar Ejecutada',
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{ver}',

                    'buttons' => [
                      
                        'ver' => $verSolicitud,                    
                    ],
                ],

            //['class' => 'yii\grid\ActionColumn'],
            ],
        ]);
            break;
        }

 ?>
</div>
