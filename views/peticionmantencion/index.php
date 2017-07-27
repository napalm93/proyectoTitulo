<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use app\models\Usuario;
use app\models\PeticionmantencionSearch;
use yii\helpers\Url;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PeticionmantencionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Solicitudes de Mantención';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peticionmantencion-index">
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    
    <?php
        Modal::begin([
                'header' => '<h4>Aprobar Solicitud</h4>',
                'id' => 'modalA',
                'size' => 'modal-lg',
            ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>
    <?php
        Modal::begin([
                'header' => '<h4>Rechazar Solicitud</h4>',
                'id' => 'modalR',
                'size' => 'modal-lg',
            ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>
    <?php
        Modal::begin([
                'header' => '<h4>Finalizar Solicitud</h4>',
                'id' => 'modalF',
                'size' => 'modal-lg',
            ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>
    <?php
        Modal::begin([
                'header' => '<h4>Registrar Solicitud</h4>',
                'id' => 'modalS',
                'size' => 'modal-lg',
            ]);
        echo "<div id='modalContent'></div>";

        Modal::end();
    ?>

    <!--
    <p>
        <?= Html::a('Create Peticionmantencion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    -->
    <?php 

        $estados = function ($model){
                if ($model->estado==0) {
                    return 'Pendiente';
                }elseif ($model->estado==1) {
                    return 'Aprobada';
                }elseif ($model->estado==2) {
                    return 'Rechazada';
                }elseif ($model->estado==3) {
                    return 'Gestionada';
                }elseif ($model->estado==4) {
                    return 'Ejecutada';
                }
            };

        $colorFilas = function($model){
            $estado = $model->estado;
            switch ($estado) {
                case '0':
                    return ['class'=>'warning'];
                    break;
                
                case '1':
                    return ['class'=>'success'];
                    break;

                case '2':
                    return ['class'=>'danger'];
                    break;

                case '3':
                    return ['class'=>'info'];
                    break;

                case '4':
                    return ['class'=>'info'];
                    break;
            }
        };
        switch (Yii::$app->user->identity->rol) {
            case '3':       //Vista de peticiones para Funcionario

        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        //'filterModel' => $searchModel,
        'rowOptions' => $colorFilas,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idPeticion',
            //'fechaGenerada',
            [
                'attribute' => 'Fecha de Creacion',
                'header' => 'Fecha de Creación',
                'value' => function($model){
                    $fechacompleta = $model->fechaGenerada;
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Fecha de Revision',
                'header' => 'Fecha de Revisión',
                'value' => function($model){
                    $fechacompleta = $model->fechaAprobada;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Fecha de Gestion',
                'header' => 'Fecha de Gestión',
                'value' => function($model){
                    $fechacompleta = $model->fechaGestionada;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Fecha Ejecucion',
                'header' => 'Fecha de Ejecución',
                'value' => function($model){
                    $fechacompleta = $model->fechaEjecutada;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Nombre Solicitante',
                'value' => function($model){
                    $usuario = Usuario::findOne($model->idUsuario)->nomUsuario;
                    return $usuario;
                },
            ],
            //'tipoServicio',
            [
                'attribute' => 'tipoServicio',
                'header' => 'Tipo de Servicio',
            ],
            //'tipoMantencion',
            [
                'attribute' => 'tipoMantencion',
                'header' => 'Tipo de Mantención',
            ],            
            //'descripcionS:ntext',
            //'descripcionD:ntext',
            [
                'attribute'=> 'estado',
                'header' => 'Estado',
                'value' => $estados,
            ],
            // 'fechaAprobada',
            // 'fechaGestionada',
            // 'fechaEjecutada',
            //'idUsuario',
            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new PeticionmantencionSearch();
                    $searchModel->idPeticion = $model->idPeticion;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
   
                    return Yii::$app->controller->renderPartial('_detalles', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        ]);
                },

            ],
            //['class' => 'yii\grid\ActionColumn'],

        ],
    ]);              
                break;
            
            case '4':       //Vista de peticiones para Jefe de Departamento

        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'rowOptions' => $colorFilas,
        //'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'idPeticion',
            //'fechaGenerada',
            [
                'attribute' => 'Fecha de Creacion',
                'header' => 'Fecha de Creación',
                'value' => function($model){
                    $fechacompleta = $model->fechaGenerada;
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Fecha de Revision',
                'header' => 'Fecha de Revisión',
                'value' => function($model){
                    $fechacompleta = $model->fechaAprobada;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Fecha de Gestion',
                'header' => 'Fecha de Gestión',
                'value' => function($model){
                    $fechacompleta = $model->fechaGestionada;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Fecha Ejecucion',
                'header' => 'Fecha de Ejecución',
                'value' => function($model){
                    $fechacompleta = $model->fechaEjecutada;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Nombre Solicitante',
                'value' => function($model){
                    $usuario = Usuario::findOne($model->idUsuario)->nomUsuario;
                    return $usuario;
                },
            ],
            //'tipoServicio',
            [
                'attribute'=> 'tipoServicio',
                'header' => 'Tipo de Servicio',
            ],
            //'tipoMantencion',
            [
                'attribute'=> 'tipoMantencion',
                'header' => 'Tipo de Mantención',
            ],
            //'descripcionS:ntext',
            //'descripcionD:ntext',       
            [
                'attribute'=> 'estado',
                'header' => 'Estado',
                'value' => $estados,
            ],
            // 'fechaAprobada',
            // 'fechaGestionada',
            // 'fechaEjecutada',
            //'idUsuario',
            /*
            [
                'attribute' => 'departamento',
                'value' => function($model){
                    $usuario = Usuario::findOne($model->idUsuario)->idDepartamento;
                    return $usuario;
                },
            ],
            */

            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new PeticionmantencionSearch();
                    $searchModel->idPeticion = $model->idPeticion;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_detalles', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        ]);
                },

            ],


            //['class' => 'yii\grid\ActionColumn'],

        ],
    ]);
                break;
            case '2':               //Vista de peticiones para Secretaria
        echo GridView::widget([
        'dataProvider' => $dataProvider,
        'summary' => '',
        'rowOptions' => $colorFilas,
        //'filterModel' => $searchModel,

        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'idPeticion',
            //'fechaGenerada',
            [
                'attribute' => 'Fecha de Creacion',
                'header' => 'Fecha de Creación',
                'value' => function($model){
                    $fechacompleta = $model->fechaGenerada;
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Fecha de Revision',
                'header' => 'Fecha de Revisión',
                'value' => function($model){
                    $fechacompleta = $model->fechaAprobada;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Fecha de Gestion',
                'header' => 'Fecha de Gestión',
                'value' => function($model){
                    $fechacompleta = $model->fechaGestionada;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Fecha Ejecucion',
                'header' => 'Fecha de Ejecución',
                'value' => function($model){
                    $fechacompleta = $model->fechaEjecutada;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            [
                'attribute' => 'Nombre Solicitante',
                'value' => function($model){
                    $usuario = Usuario::findOne($model->idUsuario)->nomUsuario;
                    return $usuario;
                },
            ],
            //'tipoServicio',
            [
                'attribute'=> 'tipoServicio',
                'header' => 'Tipo de Servicio',
            ],
            //'tipoMantencion',
            [
                'attribute'=> 'tipoMantencion',
                'header' => 'Tipo de Mantención',
            ],
            //'descripcionS:ntext',
            //'descripcionD:ntext',       
            [
                'attribute'=> 'estado',
                'header' => 'Estado',
                'value' => $estados,
            ],
            // 'fechaAprobada',
            // 'fechaGestionada',
            // 'fechaEjecutada',
            //'idUsuario',
            /*
            [
                'attribute' => 'departamento',
                'value' => function($model){
                    $usuario = Usuario::findOne($model->idUsuario)->idDepartamento;
                    return $usuario;
                },
            ],
            */

            [
                'class' => 'kartik\grid\ExpandRowColumn',
                'value' => function($model, $key, $index, $column){
                    return GridView::ROW_COLLAPSED;
                },
                'detail' => function($model, $key, $index, $column){
                    $searchModel = new PeticionmantencionSearch();
                    $searchModel->idPeticion = $model->idPeticion;
                    $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

                    return Yii::$app->controller->renderPartial('_detalles', [
                        'searchModel' => $searchModel,
                        'dataProvider' => $dataProvider,
                        ]);
                },

            ],


            //['class' => 'yii\grid\ActionColumn'],

        ],
    ]);              
                    break;    
        }

         ?>
</div>
