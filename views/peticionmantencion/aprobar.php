<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Peticionmantencion */

$this->title = 'Aprobar Solicitud';
//$this->params['breadcrumbs'][] = ['label' => 'Peticionmantencions', 'url' => ['index']];
//$this->params['breadcrumbs'][] = ['label' => $model->idPeticion, 'url' => ['view', 'id' => $model->idPeticion]];
//$this->params['breadcrumbs'][] = 'Update';
?>
<div class="peticionmantencion-update">
<?php
	$confirmacion = '¿Desea Modificar la Descripción de la Solicitud?';
?>
    <h4><?= Html::encode($confirmacion) ?></h4></br>

    <?= $this->render('_formAprobar', [
        'model' => $model,
    ]) ?>

</div>
