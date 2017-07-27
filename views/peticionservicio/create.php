<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Peticionservicio */

$this->title = 'Solicitud de Servicio';
$this->params['breadcrumbs'][] = ['label' => 'Peticion de Servicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="peticionservicio-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
