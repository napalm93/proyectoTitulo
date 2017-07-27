<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Comservicio */

$this->title = 'Registrar Comisión de Servicio';
$this->params['breadcrumbs'][] = ['label' => 'Comservicios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="comservicio-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
