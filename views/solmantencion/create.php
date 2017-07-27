<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Solmantencion */

$this->title = 'Registrar Solicitud de Mantención';
$this->params['breadcrumbs'][] = ['label' => 'Solicitud de Mantención', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="solmantencion-create">

    <!--<h1><?= Html::encode($this->title) ?></h1>-->

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
