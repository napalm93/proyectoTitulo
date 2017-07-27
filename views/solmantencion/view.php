<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Solmantencion */

$this->title = 'Solicitud Registrada';
echo '</br>';
//$this->params['breadcrumbs'][] = ['label' => 'Solicitud de Mantención', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solmantencion-view">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'idSolicitudMan',
            'numero',
            //'fechaSolicitud',
            [
                'attribute' => 'Fecha de Registro',
                'value' => function($model){
                    $fechacompleta = $model->fechaSolicitud;
                    if($fechacompleta == ""){
                        return 'Pendiente';
                    }
                    //$fechaseparada = explode("-", $fechacompleta);
                    //$fechamostrar = $fechaseparada[0];
                    $fechamostrar = date('d-m-Y', strtotime($fechacompleta));
                    return $fechamostrar;
                    }
            ],
            //'reparticion',
            [
                'attribute' => 'reparticion',
                'header' => 'Repartición',
            ],
            'centroCosto',
            //'nomSolicitante',
            [
                'attribute' => 'Nombre Solicitante',
                'value' => function($model){
                        return $model->nomSolicitante;
                }
            ],
            'ubicacionServicio',
            'anexo',
            'tipoServicio',
            'descripcion:ntext',
            'prioridad',
            'tipoMantencion',
            //'idPeticion',
        ],
    ]) ?>
        <p>
        <?= Html::a('<button type="button" class="btn btn-success" aria-label="Left Align">
                                Generar Documento <span class="glyphicon glyphicon-file" aria-hidden="true"></span></button>', 
                                ['generapdf','id'=>$model->idSolicitudMan], 
                                [
                                    'title' => 'Aprobar Peticion',
                                    'data-pjax' => '0',
                                ]) ?>
        <?= Html::a('<button type="button" class="btn btn-primary" aria-label="Left Align">
                                Volver <span class="glyphicon glyphicon-arrow-left" aria-hidden="true"></span></button>', 
                                ['/peticionmantencion/index']) ?>
    </p>

</div>
